<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

use App\Http\Requests;

class CBTController extends Controller
{
  private $img_ext;
    /*
     * Exam View Controller
     */
    public function getIndex($examsession){
        return view('cbtmanager.exampage');
    }
    
    /*
     * Add Examination Question Function
     */
    public function postAddExamination(){
        $formData = \Request::all();
        $exam = new \App\Exam();
        $exam->subject_id = $formData['subject_id'];
        $exam->month_id = $formData['month_id'];
        $exam->session_id = $formData['session_id'];
        $exam->instruction_id = $formData['instruction'];
        $exam->exam_provider_id = $formData['provider'];
        $exam->status = 0;
        $exam->time_allowed = $formData['hr'].":".$formData['min'].":".$formData['sec'];
        $exam->save();
        return redirect('admin/exam-profile'.'/'.\Crypt::encrypt($exam->id));
    }

    /*
     * Add Examination Question Function
     */
    public function postAddExaminationQuestion(){
        $formData = \Request::all();
        $question = new \App\Question();
        $question->code = 'test';
        $question->question_additional_information_id = $formData['add_info'];
        $question->exam_id = \Crypt::decrypt($formData['examid']);
        $question->name = $formData['question_name'];
        $question->average_time = 0;
        $question->save();
        
        for($x=1; $x<6; $x++){
           $status =0;
           if(\Request::Input('answer') == $x)
               $status = 1;
           if(!empty(\Request::Input('option'.$x))){
               $option = new \App\Option();
               $option->name = \Request::Input('option'.$x);
               $option->question_id = $question->id;
               $option->status = $status;
               $option->save();
           } 
        }
        return redirect('admin/exam-profile'.'/'.$formData['examid']);
    }

    /*
     * Update Examination Question Function
     */
    public function postUpdateExaminationQuestion(Request $request){

        $formData = \Request::all();
        //Edit Question
        $question = \App\Question::find(\Crypt::decrypt($formData['questionid']));
        $question->question_additional_information_id = $formData['add_info'];
        $question->name = $formData['question_name'];
        $question->save();

        //UnPublish Exam

        //Delete Exam History
        if($question->exam->history){
            foreach($question->exam->history as $history){
                $history->delete();
            }
        }

        //Delete Question Options
        if($question->option){
            foreach($question->option as $option){
                $option->delete();
            }
        }

        for($x=1; $x<6; $x++){
            $status =0;
            if(\Request::Input('answer') == $x)
                $status = 1;
            if(!empty(\Request::Input('option'.$x))){
                $option = new \App\Option();
                $option->name = \Request::Input('option'.$x);
                $option->question_id = $question->id;
                $option->status = $status;
                $option->save();
            }
        }
        return redirect('admin/exam-profile'.'/'.\Crypt::encrypt($question->exam->id));
    }


    public function postDeleteExamQuestion(Request $request){
        $data = $request->only([
            'question_id',
            'exam_id'
        ]);
        $question = \App\Question::find($data['question_id']);

        //Delete Exam History
        if($question->exam->history){
            foreach($question->exam->history as $history){
                $history->delete();
            }
        }

        //Delete Question Options
        foreach($question->option as $option){
            $option->delete();
        }
        //Delete Question
        $question->delete();
        return json_encode(['url' => url('admin/exam-profile/'.$data['exam_id'])]);
    }


    private function base64_to_img($base64_string, $output_file) {
      $data = explode(',', $base64_string);
      $imgExt = $this->getImgExt($data[0]);
      $ifp = fopen($output_file.'.'.$imgExt, "wb");
      
      fwrite($ifp, base64_decode($data[1])); 
      fclose($ifp); 
      return $output_file; 
    }

    private function getImgExt($data) {
      $first = explode('/', $data)[1];
      $imgExt = explode(';', $first)[0];
      $this->img_ext = $imgExt;
      return $imgExt;
    }

    Public function postAdditionalInfo() {
      if (\Request::input("image_description")) {
        $info = new \App\QuestionAdditionalInformation();
        $info->information_type_id = 1;
        $info->name = \Request::input("image_description");
        $info->save();
        $this->base64_to_img(\Request::input("image"), storage_path()."/additional_info/$info->id");

        $update = \App\QuestionAdditionalInformation::find($info->id);
        $update->description = $this->img_ext;
        $update->update();
      }

      if (\Request::input("text_description")) {
        $info = new \App\QuestionAdditionalInformation();
        $info->information_type_id = 2;
        $info->name = \Request::input("text_description");
        $info->description = \Request::input("question_name");
        $info->save();
      }

      $information = \App\QuestionAdditionalInformation::orderBy("created_at", "DESC")->get();
      return $information;
    }


    Public function getAdditionalInfos() {
      $information = \App\QuestionAdditionalInformation::orderBy("created_at", "DESC")->get();
      return $information;
    }
}

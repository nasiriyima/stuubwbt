<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

use App\Http\Requests;

class CBTController extends Controller
{
    /*
     * Exam View Controller
     */
    Public function getIndex($examsession){
        return view('cbtmanager.exampage');
    }
    
    /*
     * Add Examination Question Function
     */
    Public function postAddExamination(){
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
    Public function postAddExaminationQuestion(){
        $formData = \Request::all();
        $question = new \App\Question();
        $question->code = 'test';
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

    Public function postAdditionalInfo() {
      
      if (\Request::input("image_description")) {
        $info = new \App\QuestionAdditionalInformation();
        $info->information_type_id = 1;
        $info->name = \Request::input("image_description");
        $info->save();

        $file = \Request::input("image");
        $extension = $file->getClientOriginalExtension();
        $path = public_path()."/assets/img/additional_info/";
        $image_name = $info->id. ".png";
        $file_moved = $file->move($path, $image_name);
        $path = $file_moved->getRealPath();
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
}

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

    public function postAdditionalInfo() {
      $formData = Input::all();
      $addInfo = new \App\QuestionAdditionalInformation();
      $addInfo->name = $formData['question_name'];
      $addInfo->question_id = null;
      $addInfo->save();
    }
}

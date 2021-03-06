<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
    /*
     * Student Controller Dashboard
     */
    public function getIndex(){
        return view('student.index');
    }
    
    public function getMyExam(){
        $data['bodies'] = \App\ExamProvider::all();
        $data['categories'] = \App\Category::all();
        return view('student.myexam.index',$data);
    }
    
    public function postSubjects(){
        $post = \Request::except('_token');
        $redundant = []; $group = [];
        $subjects = \App\Subject::where([
            'category_id' => $post['category_id']
                ])->get();
        foreach($subjects as $subject){
            $exam = \App\Exam::where([
                'subject_id' => $subject->id,
                'exam_provider_id' => $post['exam_body_id']
            ])->first();
            if(count($exam) > 0){
                if(!in_array($exam->subject_id, $redundant)){
                    array_push($redundant, $exam->subject_id);
                    array_push($group,$exam);
                }
            }
        }
        $page = array_chunk($group,3);
        $pages = array_chunk($page,3);
        $data['pages'] = $pages;
        $data['body'] = $post['exam_body_id'];
        $data['category'] = $post['category_id'];
        return view('student.myexam.subjects',$data);
    }
    
    public function getInstructions($body,$category,$subject,$month,$session){
        $exam = \App\Exam::where([
            'subject_id' => $subject,
            'exam_provider_id' => $body,
            'month_id' => $month,
            'session_id' => $session,
        ])->first();
        if($exam && isset($exam) && !is_null($exam) && count($exam->question) > 0 ){
            $data['questions'] = count($exam->question);
            $data['instruction'] = $exam->instruction;
            $data['body'] = $body;
            $data['bodyname'] = \Session::get('bodyname');
            $data['category'] = $category;
            $data['categoryname'] = \Session::get('categoryname');
            $data['subject'] = $subject;
            $data['subjectname'] = \Session::get('subjectname');
            $data['exam'] = $exam->id;
            $data['time_allowed'] = $exam->time_allowed;
            $data['time_left'] = $this->getTimeLeft($exam->id,$data['time_allowed']);
            $data['month'] = $month;
            $data['monthname'] = \App\Month::find($month)->name;
            \Session::put('monthname',$data['monthname']);
            $data['session'] = $session;
            $data['sessionname'] = \App\Session::find($session)->name;
            \Session::put('sessionname',$data['sessionname']);
            \Session::put('exam',$exam->id);
            return view('student.myexam.instructions',$data);
        }
        return redirect()->back()->with('error','No exam was found for '.
                \Session::get('bodyname').' '
                .\Session::get('subjectname').', '
                .\App\Month::find($month)->name.', '
                .\App\Session::find($session)->name);
    }
    public function getQuestions($exam){
        if(\Session::has('exam')){
            $data['questions'] = \App\Question::where([
            'exam_id' => $exam]);
            $data['exam'] = $exam;
            $data['time_allowed'] = \App\Question::where([
                'exam_id' => $exam])->first()->exam->time_allowed;
            $data['time_left'] = $this->getTimeLeft($exam, $data['time_allowed']);
            $data['bodyname'] = \Session::get('bodyname');
            $data['categoryname'] = \Session::get('categoryname');
            $data['subjectname'] = \Session::get('subjectname');
            $data['monthname'] = \Session::get('monthname');
            $data['sessionname'] = \Session::get('sessionname');
            return view('student.myexam.questions',$data);
        }
        return redirect('student')->with('error','No active exam session was found');
    }
    public function postExamComplete(){
        $data = \Request::except('_token');
        $passed = 0;
        $systemselection = [];
        foreach($data['selections'] as $question => $answer){
            $correct_answer = \App\Question::find($question)->option()->correctAnswer()->id;
            if($answer == $correct_answer){
                $passed++;
            }
            $systemselection[$question] = $correct_answer;
        }
        $failed = count($data['selections'])-$passed;
        \Session::put('passed',$passed);
        \Session::put('passedpercentage',  number_format($passed*100/count($data['selections']),2));
        \Session::put('failed',$failed);
        \Session::put('failedpercentage',  number_format($failed*100/count($data['selections']),2));
        \Session::put('userselection',  json_encode($data['selections']));
        \Session::put('systemselection',  json_encode($systemselection));
        
        $history = new \App\History();
        $history->exam_id = \Session::get('exam');
        $history->elapsed_time = $data['elapsed_time'];
        $history->answers = json_encode($data);
        $history->user_id = 1;
        $history->score = $passed;
        $history->status = 1;
        $history->save();
        \Session::put('history',$history->id);
        return url('student/exam-complete');
    }    
    public function getExamComplete(){
        if(\Session::has('exam')){
            $data['bodyname'] = \Session::get('bodyname');
            $data['categoryname'] = \Session::get('categoryname');
            $data['subjectname'] = \Session::get('subjectname');
            $data['monthname'] = \Session::get('monthname');
            $data['sessionname'] = \Session::get('sessionname');
            $data['passed'] = (\Session::has('passed'))?  \Session::get('passed') : 0 ;
            $data['failed'] = (\Session::has('failed'))?  \Session::get('failed') : 0 ;
            $data['passedpercentage'] = (\Session::has('passedpercentage'))?  \Session::get('passedpercentage') : 0 ;
            $data['failedpercentage'] = (\Session::has('failedpercentage'))?  \Session::get('failedpercentage') : 0 ;
            $data['userselection'] = \Session::get('userselection');
            $data['systemselection'] = \Session::get('systemselection');
            $data['history_week_count'] = \App\History::where([
                'exam_id' => \Session::get('exam'),
                'user_id' => 1,
            ])->whereBetween('created_at',[
                \Carbon\Carbon::now()->subWeek(), 
                \Carbon\Carbon::now()
            ])->count();
            
            $data['history_month_count'] = \App\History::where([
                'exam_id' => \Session::get('exam'),
                'user_id' => 1,
            ])->whereBetween('created_at', [
                \Carbon\Carbon::now()->startOfMonth()->subMonth(),
                \Carbon\Carbon::now()->startOfMonth()
            ])->count();
            $data['history_count'] = \App\History::where([
                'exam_id' => \Session::get('exam'),
                'user_id' => 1,
            ])->count();
            $percentage = $this->evaluateAttempts(\App\History::class,'percentage');
            $inequality = $this->evaluateAttempts(\App\History::class,'inequalities');
            $data['attempt_phrase'] = ($percentage != 0)? '<small>'.$percentage.'% <strong>'.$inequality
                                      .' last month</strong></small>' : 
                                      '<small><strong>'.$inequality.' last month</strong></small>';
            $data['attempt_percentage'] = $percentage;
            return view('student.myexam.score')->with($data);
        }
        return redirect('student')->with('error','No exam session is active');
    }    
    public function getReview(){
        if(\Session::has('history') && \Session::has('exam')){
            $data['bodyname'] = \Session::get('bodyname');
            $data['categoryname'] = \Session::get('categoryname');
            $data['subjectname'] = \Session::get('subjectname');
            $data['monthname'] = \Session::get('monthname');
            $data['sessionname'] = \Session::get('sessionname');
            $history = \App\History::find(\Session::get('history'));
            $exam = \Session::get('exam');
            $answers = json_decode($history->answers);
            $data['selections'] = $answers->selections;
            $data['questions'] = \App\Question::where([
            'exam_id' => $exam]);
            $data['exam'] = $exam;
            $data['time_allowed'] = \App\Question::where([
                'exam_id' => $exam])->first()->exam->time_allowed;
            $data['elapsed_time'] = $history->elapsed_time;
            return view('student.myexam.review')->with($data);
        }
        return redirect('student')->with('error','No active exam review and session was found');
    }
    public function getMyMessageInbox(){
        return view('student.mymessage.index');
    }    
    public function getMyProfile(){
        return view('student.myprofile.index');
    }    
    public function getMyRecord(){
        $data['histories'] = \App\History::where([
            'user_id' => 1
        ])->whereBetween(
            'created_at', [
                \Carbon\Carbon::now()->startOfMonth(),
                \Carbon\Carbon::now()
        ])->get();
        return view('student.myrecords.index')->with($data);
    }    
    public function getErrortest(){
        return redirect()->back()->with('error','error message');
    }    
    public static function generateOptionLable($optionCount){
        $labels = range('a', 'z');
        return $labels[$optionCount];
    }    
    public function aborted(){
        if(connection_aborted()){
            
        }
    }    
    private function getTimeLeft($exam, $time_allowed){
        if(!\Session::has('time_left') && \Session::get('exam') != $exam){
            $time = explode(':',$time_allowed);
            $hr = $time[0];
            $min = $time[1];
            $sec = $time[2];
            \Session::put('time_left',date('Y/m/d H:i:s', strtotime("+$hr hour $min minute $sec second")));
            \Session::put('exam', $exam);
            return date('Y/m/d H:i:s', strtotime("+$hr hour $min minute $sec second"));
        }
        return \Session::get('time_left');
    }    
    private function evaluateAttempts($history,$option){
        $last_month_count = $history::where([
            'user_id' => 1
        ])->whereBetween('created_at',[
            \Carbon\Carbon::now()->startOfMonth()->subMonth(),
            \Carbon\Carbon::now()->startOfMonth()
        ])->count();

        $this_month_count = $history::where([
            'user_id' => 1
        ])->whereBetween('created_at',[
            \Carbon\Carbon::now()->startOfMonth(),
            \Carbon\Carbon::now()
        ])->count();

        $month_diff = $this_month_count - $last_month_count;
        if($option == 'percentage'){
            if($this_month_count == 0){
                return 100;
            }
            return abs(($month_diff/$this_month_count) * 100);
        }
        if($option == 'inequalities'){
            if($month_diff > 0){
                return 'higher than';
            } elseif($month_diff == 0){
                return 'equal to';
            }
            return 'lower than';
        }
        return false;
    }    
    public function getTest(){
        return \Carbon\Carbon::now()->startOfWeek()->subWeek();
    }
    public function getProfile(){
        return view('student.profile.index');
    }
}

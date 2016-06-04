<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Carbon\Carbon;

class StudentController extends Controller
{
    public $page_data = [];
    public function __construct(){
        $this->page_data['inbox_count'] = \App\User::find(1)->message()->inbox()->count();
        $this->page_data['sent_count'] = \App\User::find(1)->message()->sent()->count();
        $this->page_data['saved_count'] = \App\User::find(1)->message()->draft()->count();
        $this->page_data['deleted_count'] = \App\User::find(1)->message()->Trash()->count();
    }
    /*
     * Student Controller Dashboard
     */
    public function getIndex(){
        $this->page_data['fname'] = 'UnAuthenticated User';
        $this->page_data['leaders'] = $this->getLeaders(Carbon::now()->subMonth(),
            Carbon::now());
        $this->page_data['startDate'] =Carbon::now()->subMonth();
        $this->page_data['endDate'] =Carbon::now();
        $this->page_data['series'] = $this->getSeries(\App\User::find(1), $this->page_data['startDate'], $this->page_data['endDate']);
        return view('student.index', $this->page_data);
    }

    private function getLeaders($startDate, $endDate){
        return \App\History::leadersBoard($startDate, $endDate)->get();
    }

    private function getSeries($user, $startDate, $endDate){
        $attempts = $user->history()->attempts($startDate, $endDate);
        $month = 1;
        $series['name'] = "Avg Score";
        $series['color'] = "green";
        $data = [];
        $axis = [];
        $exam_attempted = [];
        $divisors = [];
        while($attempts->count() < 10 || $month < 13){
            $startDate = Carbon::now()->subMonth($month);
            $attempts = $user->history()->attempts($startDate, $endDate);
            $month ++;
        }
        $histories = $attempts->get()->take(28);
        foreach($histories as $history){
            $date_time = date_format($history->created_at, 'd-m-Y');
            $same_day = strtotime($date_time);
            if(!in_array($same_day, $exam_attempted)){
                array_push($exam_attempted, $same_day);
                $axis['x'][$same_day] =  (int) $same_day;
                $axis['y'][$same_day] = (double) $history->score;
                $divisors[$same_day] = 1;
            } else {
                $axis['y'][$same_day] = $axis['y'][$same_day] + (double) $history->score;
                $divisors[$same_day] = $divisors[$same_day] + 1;
            }
        }

        foreach($exam_attempted as $date){
            $value['x'] = $axis['x'][$date];
            $value['y'] = round((double)($axis['y'][$date] /$divisors[$date]), 2);
            array_push($data, (object) $value);
        }

        $series['data'] = $data;
        return json_encode([$series]);
    }
    
    public function getMyExam(){
        $this->page_data['bodies'] = \App\ExamProvider::all();
        $this->page_data['categories'] = \App\Category::all();
        return view('student.myexam.index',$this->page_data);
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
    
    public function getSession($body,$category,$subject){
        $data['body'] = $body;
        $data['bodyname'] = \App\ExamProvider::find($body)->name;
        \Session::put('bodyname',$data['bodyname']);
        $data['category'] = $category;
        $data['categoryname'] = \App\Category::find($category)->name;
        \Session::put('categoryname',$data['categoryname']);
        $data['subject'] = $subject;
        $data['subjectname'] = \App\Subject::find($subject)->name;
        \Session::put('subjectname',$data['subjectname']);
        $data['months'] = \App\Month::where([
            'exam_provider_id' => $body
        ])->get();
        $data['sessions'] = \App\Session::all();
        return view('student.myexam.session',$data);
    }
    
    public function postInstruction(){
        $post = \Request::except('_token');
        \Session::put('body', $post['body']);
        \Session::put('category', $post['category']);
        \Session::put('subject', $post['subject']);
        \Session::put('month', $post['month']);
        \Session::put('session', $post['session']);
        return json_encode([
            'url' => url('student/instructions').'/'.$post['body'].'/'.$post['category'].'/'.$post['subject'].'/'.$post['month'].'/'.$post['session']
        ]);
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
                Carbon::now()->subWeek(),
                Carbon::now()
            ])->count();
            
            $data['history_month_count'] = \App\History::where([
                'exam_id' => \Session::get('exam'),
                'user_id' => 1,
            ])->whereBetween('created_at', [
                Carbon::now()->startOfMonth()->subMonth(),
                Carbon::now()->startOfMonth()
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
        $this->page_data['message_inbox'] = \App\User::find(1)->message()->inbox()->get();
        $this->page_data['open'] = 'open';
        return view('student.mymessage.index')->with($this->page_data);
    }

    public function getMyMessageSent(){
        $this->page_data['message_inbox'] = \App\Message::inbox();
        $this->page_data['open'] = 'open';
        return view('student.mymessage.sent')->with($this->page_data);
    }

    public function getMyMessageSaved(){
        $this->page_data['message_inbox'] = \App\Message::inbox();
        $this->page_data['open'] = 'open';
        return view('student.mymessage.Saved')->with($this->page_data);
    }

    public function getMyMessageDeleted(){
        $this->page_data['message_inbox'] = \App\Message::inbox();
        $this->page_data['open'] = 'open';
        return view('student.mymessage.deleted')->with($this->page_data);
    }
    
    public function getMyProfile(){
        return view('student.myprofile.index')->with($this->page_data);
    }
    
    public function getMyRecord($startDate = '', $endDate = ''){
        if($startDate && $endDate){
            $this->page_data['histories'] = \App\History::where([
                'user_id' => 1
            ])->whereBetween(
                'created_at', [
                Carbon::createFromTimestamp($startDate),
                Carbon::createFromTimestamp($endDate)
            ])->get();
            $this->page_data['startDate'] =  Carbon::createFromTimestamp($startDate);
            $this->page_data['endDate'] = Carbon::createFromTimestamp($endDate);
        } else {
            $this->page_data['histories'] = \App\History::where([
                'user_id' => 1
            ])->whereBetween(
                'created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()
            ])->get();
            $this->page_data['startDate'] = Carbon::now()->startOfMonth();
            $this->page_data['endDate'] = Carbon::now();
        }

        return view('student.myrecords.index')->with($this->page_data);
    }

    public function postMyRecord(){
        $request = \Request::except('_token');
        $rules = [
            'startDate'  => 'required',
            'endDate'=> 'required|after:startDate',
        ];
        $validation = \Validator::make($request, $rules);
        if($validation->passes()){
            $startDate = Carbon::createFromFormat('d.m.Y', $request['startDate'])->timestamp;
            $endDate = Carbon::createFromFormat('d.m.Y', $request['endDate'])->timestamp;
            return $this->getMyRecord($startDate, $endDate);
        }
        return redirect()->back()->withErrors($validation)->withInput();
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
            Carbon::now()->startOfMonth()->subMonth(),
            Carbon::now()->startOfMonth()
        ])->count();

        $this_month_count = $history::where([
            'user_id' => 1
        ])->whereBetween('created_at',[
            Carbon::now()->startOfMonth(),
            Carbon::now()
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
        return Carbon::now()->startOfWeek()->subWeek();
    }
}

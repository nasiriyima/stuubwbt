<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $page_data['pagename'] = 'home';
        $page_data['reg_student'] = 1000;
        return view('frontweb.index', $page_data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAboutUs()
    {
        $page_data['pagename'] = 'aboutus';
        return view('frontweb.aboutus', $page_data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getContactUs()
    {
        $page_data['pagename'] = 'contactus';
        return view('frontweb.contactus', $page_data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNews($id = NULL)
    {
        if(empty($id)) {
            $page_data['pagename'] = 'news';
            $page_data['news'] = \App\News::publishedNews()->chunk(4);
            return view('frontweb.news', $page_data);
        }else{
            $page_data['pagename'] = 'news';
            $page_data['newsitem'] = \App\News::find(\Crypt::decrypt($id));
            return view('frontweb.newsitem', $page_data);
        }
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignIn(Request $request)
    {
        $page_data = [];
        if($request->session()->get('message'));
        $page_data['message'] = $request->session()->get('message');
        return view('frontweb.signin', $page_data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignUp(Request $request)
    {
        $page_data = [];
        if($request->session()->get('message'));
        $page_data['message'] = $request->session()->get('message');
        return view('frontweb.signup', $page_data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTandC()
    {
        return view('frontweb.signup');
    }

    public function getFile($directory, $image){

        if($directory == 'profile_pictures'){
            if(file_exists(str_replace('\\', '/', storage_path().'/profile_pictures/').$image)){
                $path = str_replace('\\', '/', storage_path().'/profile_pictures/').$image;
            } else {
                $path = str_replace('\\', '/', public_path().'/assets/img/team/img32-md.jpg');
            }
        } else {
            if(file_exists(str_replace('\\', '/', storage_path().'/additional_info/').$image)){
                $path = str_replace('\\', '/', storage_path().'/additional_info/').$image;
            } else {
                $path = str_replace('\\', '/', public_path().'/assets/img/team/img32-md.jpg');
            }
        }
        $file = \File::get($path);
        $type = \File::mimeType($path);
        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function getTryNow($exam_id = ''){
        if(!\Session::has('exam')){
            return $this->getInstructions();
        } elseif( \Session::has('exam') && \Session::get('exam') == $exam_id) {
            return $this->getQuestions();
        }
        \Session::forget('exam');
        \Session::forget('time_left');
        return 'An active exam session could not be saved because you are not a registered user, Please click <a href="'.url('web/try-now').'">here</a> to restart a new exam session';
    }

    private function getInstructions(){
        $exam = $this->generateRandomExam();
        \Session::put('body', $exam->examProvider->id);
        \Session::put('bodyname', $exam->examProvider->name);
        \Session::put('category', $exam->subject->category_id);
        \Session::put('categoryname', $exam->subject->category->name);
        \Session::put('subject', $exam->subject_id);
        \Session::put('subjectname', $exam->subject->name);
        \Session::put('month', $exam->month_id);
        \Session::put('monthname', $exam->month->name);
        \Session::put('session', $exam->session_id);
        \Session::put('sessionname', $exam->session->name);
        \Session::put('exam', $exam->id);

        $data['questions'] = count($exam->question);
        $data['instruction'] = $exam->instruction;
        $data['body'] = \Session::get('body');
        $data['bodyname'] = \Session::get('bodyname');
        $data['category'] = \Session::get('category');
        $data['categoryname'] = \Session::get('categoryname');
        $data['subject'] = \Session::get('subject');
        $data['subjectname'] = \Session::get('subjectname');
        $data['exam'] = $exam->id;
        $data['time_allowed'] = '00:05:00:00';
        $data['monthname'] = \Session::get('monthname');
        $data['session'] = \Session::get('session');
        $data['sessionname'] = \Session::get('sessionname');
        $data['trynow'] = true;
        return view('student.myexam.instructions',$data);
    }

    private function getQuestions(){
        $data['questions'] = \App\Question::where([
            'exam_id' => \Session::get('exam')])->limit(10);
        $data['exam'] = \Session::get('exam');
        $data['time_allowed'] = '00:05:00:00';
        $data['time_left'] = $this->getTimeLeft(\Session::get('exam'), $data['time_allowed']);
        $data['warning_time'] = $this->getWarningTime($data['time_allowed']);
        $data['bodyname'] = \Session::get('bodyname');
        $data['categoryname'] = \Session::get('categoryname');
        $data['subjectname'] = \Session::get('subjectname');
        $data['monthname'] = \Session::get('monthname');
        $data['sessionname'] = \Session::get('sessionname');
        $data['trynow'] = true;
        return view('student.myexam.questions',$data);
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
        \Session::put('elapsed_time',  $data['elapsed_time']);
        \Session::put('exam',  $data['exam_id']);
        return url('web/exam-complete');
    }

    public function getExamComplete(){
        if(\Session::has('exam')){
            $this->page_data['bodyname'] = \Session::get('bodyname');
            $this->page_data['categoryname'] = \Session::get('categoryname');
            $this->page_data['subjectname'] = \Session::get('subjectname');
            $this->page_data['monthname'] = \Session::get('monthname');
            $this->page_data['sessionname'] = \Session::get('sessionname');
            $this->page_data['passed'] = (\Session::has('passed'))?  \Session::get('passed') : 0 ;
            $this->page_data['failed'] = (\Session::has('failed'))?  \Session::get('failed') : 0 ;
            $this->page_data['passedpercentage'] = (\Session::has('passedpercentage'))?  \Session::get('passedpercentage') : 0 ;
            $this->page_data['failedpercentage'] = (\Session::has('failedpercentage'))?  \Session::get('failedpercentage') : 0 ;
            $this->page_data['userselection'] = \Session::get('userselection');
            $this->page_data['systemselection'] = \Session::get('systemselection');
            $this->page_data['trynow'] = true;
            return view('student.myexam.score')->with($this->page_data);
        }
        return redirect('web')->with('error','No exam session is active');
    }

    public function getReview(){
        if(\Session::has('userselection')){
            $data['bodyname'] = \Session::get('bodyname');
            $data['categoryname'] = \Session::get('categoryname');
            $data['subjectname'] = \Session::get('subjectname');
            $data['monthname'] = \Session::get('monthname');
            $data['sessionname'] = \Session::get('sessionname');
            $exam = \Session::get('exam');
            $data['selections'] = json_decode(\Session::get('userselection'));
            $data['questions'] = \App\Question::where([
                'exam_id' => $exam]);
            $data['exam'] = $exam;
            $data['time_allowed'] = '00:05:00:00';
            $data['elapsed_time'] = \Session::get('elapsed_time');
            $data['trynow'] = true;
            return view('student.myexam.review')->with($data);
        }
        return redirect('web')->with('error','No active exam review and session was found');
    }

    private function generateRandomExam(){
        $examDetails = [];
        $count = 1;
        $coreSubjects = \App\Subject::where([
            'category_id' => 1
        ])->get();
        foreach($coreSubjects as $subject){
            $exams = \App\Exam::where([
                'subject_id' => $subject->id
            ])->publishedExams();
            foreach($exams as $exam){
                if(count($exam->question) > 0 && $count < 11){
                    $examDetails[$count] = $exam;
                    $count++;
                }
            }
        }
        $index = rand(1, count($examDetails));
        return $examDetails[$index];
    }

    private function getWarningTime($time_left){
        $warningTime = '00:05:00:00';
        $hr = explode(':', $time_left)[0];
        $min = explode(':', $time_left)[1];
        $sec = explode(':', $time_left)[2];
        $hrToSec = $hr * 60 * 60;
        $minToSec = $min * 60;
        $secTotal = $hrToSec + $minToSec + $sec;
        if($secTotal < 301 ){
            $halfTime = $secTotal/2;
            if($halfTime < 60){
                $warningTime = ($halfTime < 10)? '00:00:0'.floor($halfTime).':00': '00:00:'.floor($halfTime).':00';
                return $warningTime;
            }
            $convertToMin = $halfTime/60;
            $warningTime = ($convertToMin < 10)? '00:0'.floor($convertToMin).':00:00': '00:'.floor($convertToMin).':00:00';
            return $warningTime;
        }
        return $warningTime;
    }

    private function getTimeLeft($exam, $time_allowed){
        if(\Session::get('time_left') == null || \Session::get('exam') != $exam){
            $time = explode(':',$time_allowed);
            $hr = $time[0];
            $min = $time[1];
            $sec = $time[2];
            \Session::put('time_left',date('Y/m/d H:i:s', strtotime("+$hr hour $min minute $sec second")));
            return date('Y/m/d H:i:s', strtotime("+$hr hour $min minute $sec second"));
        }
        return \Session::get('time_left');
    }

    public function getTest(){
        $examDetails = [];
        $count = 1;
        $coreSubjects = \App\Subject::where([
            'category_id' => 1
        ])->get();
        foreach($coreSubjects as $subject){
            $exams = \App\Exam::where([
                'subject_id' => $subject->id
            ])->get();
            foreach($exams as $exam){
                if(count($exam->question) > 0){
                    $examDetails[$count] = $exam;
                    $count++;
                }
            }
        }
        $index = rand(1, count($examDetails));
        return $examDetails[$index];
    }
}

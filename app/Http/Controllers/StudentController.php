<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Carbon\Carbon;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public $page_data = [];
    public function __construct(){
        if(!\Sentinel::check()){
           return redirect('web')->send();
        }
        $this->page_data['user'] = \App\User::find(\Sentinel::check()->id);
        $this->page_data['inbox_count'] = \App\User::find($this->page_data['user']->id)->receiver()->inbox()->count();
        $this->page_data['sent_count'] = \App\User::find($this->page_data['user']->id)->sender()->sent()->count();
        $this->page_data['saved_count'] = \App\User::find($this->page_data['user']->id)->sender()->draft()->count();
        $this->page_data['deleted_count'] = \App\User::find($this->page_data['user']->id)->receiver()->onlyTrashed()->get()->count();
        $this->page_data['notifications'] = $this->getNotifications();
    }
    /*
     * Student Controller Dashboard
     */
    public function getIndex(){
        $user = \App\User::find($this->page_data['user']->id);
        $this->page_data['fname'] = explode(' ',$user->first_name)[0];
        $this->page_data['leaders'] = $this->getLeaders(Carbon::now()->subMonth(),
            Carbon::now());
        $this->page_data['startDate'] = Carbon::now()->subMonth();
        $this->page_data['endDate'] = Carbon::now();
        $this->page_data['series'] = $this->getSeries($user, $this->page_data['startDate'], $this->page_data['endDate']);
        return view('student.index', $this->page_data);
    }

    private function getLeaders($startDate, $endDate){
        return \App\History::leadersBoard($startDate, $endDate)->get()->take(4);
    }

    private function getSeries($user, $startDate, $endDate){
        $attempts = $user->history()->attempts($startDate, $endDate);
        $month = 0;
        $series['name'] = "Avg Score";
        $series['color'] = "green";
        $data = [
            (object)[
                'x' => 0,
                'y' => 0
            ]
        ];
        $axis = [];
        $exam_attempted = [];
        $divisors = [];
        if($attempts->count() > 0){
            $data = [];
            while($month < 12 && $attempts->count() < 10){
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
        $history->user_id = $this->page_data['user']->id;
        $history->score = $passed;
        $history->status = 1;
        $history->save();
        \Session::put('history',$history->id);
        return url('student/exam-complete');
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
            $this->page_data['history_week_count'] = \App\History::where([
                'exam_id' => \Session::get('exam'),
                'user_id' => $this->page_data['user']->id,
            ])->whereBetween('created_at',[
                Carbon::now()->subWeek(),
                Carbon::now()
            ])->count();

            $this->page_data['history_month_count'] = \App\History::where([
                'exam_id' => \Session::get('exam'),
                'user_id' => $this->page_data['user']->id,
            ])->whereBetween('created_at', [
                Carbon::now()->startOfMonth()->subMonth(),
                Carbon::now()->startOfMonth()
            ])->count();
            $this->page_data['history_count'] = \App\History::where([
                'exam_id' => \Session::get('exam'),
                'user_id' => $this->page_data['user']->id,
            ])->count();
            $percentage = $this->evaluateAttempts(\App\History::class,'percentage');
            $inequality = $this->evaluateAttempts(\App\History::class,'inequalities');
            $this->page_data['attempt_phrase'] = ($percentage != 0)? '<small>'.round($percentage).'% <strong>'.$inequality
                                      .' last month</strong></small>' :
                                      '<small><strong>'.$inequality.' last month</strong></small>';
            $this->page_data['attempt_percentage'] = $percentage;
            return view('student.myexam.score')->with($this->page_data);
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
        $this->page_data['message_inbox'] = \App\User::find($this->page_data['user']->id)->receiver()->inbox()->get();
        $this->page_data['profileStats'] = ($this->page_data['user']->profile)?
            $this->page_data['user']->profile()->statistics() : 0;
        $this->page_data['open'] = 'open';
        return view('student.mymessage.index')->with($this->page_data);
    }

    public function postProcessMessage(){
        $request = \Request::except('_token');
        $status = '';
        if($request['action'] == 'Save'){
            $rules = [
                'subject' => 'required'
            ];
            $validator = \Validator::make($request, $rules);
            if($validator->passes()){
                if(isset($request['to'])){
                    foreach($request['to'] as $id){
                        //Save Inbox with status unread
                        $message = new \App\Message();
                        $message->subject = $request['subject'];
                        $message->body = $request['body'] or '';
                        $message->receiver_id = $id;
                        $message->sender_id = $this->page_data['user']->id;
                        $message->store = 1;
                        $message->status = 0;
                        $message->save();

                        //Save Sent with status 0
                        $message = new \App\Message();
                        $message->subject = $request['subject'];
                        $message->body = $request['body'] or '';
                        $message->receiver_id = $id;
                        $message->sender_id = $this->page_data['user']->id;
                        $message->store = 2;
                        $message->status = 0;
                        $message->save();
                    }
                } else {
                    $message = new \App\Message();
                    $message->subject = $request['subject'] or '';
                    $message->body = $request['body'];
                    $message->receiver_id = 0;
                    $message->sender_id = $this->page_data['user']->id;
                    $message->store = 3;
                    $message->status = 0;
                    $message->save();
                }
                $status = 'Message was saved successfully';
                return redirect()->back()->with('message', $status);
            }
            return redirect()->back()->withErrors($validator->errors());
        }
        if($request['action'] == 'Send' || $request['action'] == 'Reply' || $request['action'] == 'Forward'){
            $rules = [
                'to' => 'required',
                'subject' => 'required|max:255',
                'body' => 'required',
            ];
            $validator = \Validator::make($request, $rules);
            if($validator->passes()){
                foreach($request['to'] as $id){
                    $message = new \App\Message();
                    $message->subject = $request['subject'];
                    $message->body = $request['body'];
                    $message->receiver_id = $id;
                    $message->sender_id = $this->page_data['user']->id;
                    $message->status = 0;
                    $message->save();
                    if(!$message->save()){
                        $message = new \App\Message();
                        $message->subject = $request['subject'];
                        $message->body = $request['body'];
                        $message->receiver_id = $id;
                        $message->sender_id = $this->page_data['user']->id;
                        $message->status = 3;
                        $message->save();
                    }
                }
                $status = 'Message was sent successfully';
                return redirect()->back()->with('message', $status);
            }
            return redirect()->back()->withErrors($validator->errors());
        }
    }

    public function postMessageDetails(){
        $request = \Request::except('_token');
        $message = \App\Message::find(\Crypt::decrypt($request['id']));
        $sender =  \App\User::find($message->sender_id);
        $receiver =  isset($message->receiver_id)? \App\User::find($message->receiver_id): '';
        if($request['action'] == 'reply'){
            return json_encode([
                'sender' => $sender,
                'message' => [
                    'subject' => 'RE: '.$message->subject,
                    'body' => $message->body
                ]
            ]);
        }

        if($request['action'] == 'edit'){
            $friends = [];
            $friendshipAccepted =  $this->page_data['user']->friendship()->requestAccepted()->get();
            foreach($friendshipAccepted as $accepted){
                array_push($friends, \App\User::find($accepted->friend_id));
            }

            return json_encode([
                'receiver' => $message->receiver_id,
                'friends' => $friends,
                'message' => [
                    'subject' => $message->subject,
                    'body' => $message->body
                ]
            ]);
        }
        if($request['action'] == 'forward'){
            $friends = [];
            $friendshipAccepted =  $this->page_data['user']->friendship()->requestAccepted()->get();
            foreach($friendshipAccepted as $accepted){
                array_push($friends, \App\User::find($accepted->friend_id));
            }
            return json_encode([
                'friends' => $friends,
                'message' => [
                    'subject' => 'FW: '.$message->subject,
                    'body' => '---------- Forwarded message ---------- <br />
                                From: '.$sender->first_name.'<br />
                                Date: '.$message->created_at->format('D, M d, Y @ h:m').'<br />
                                Subject: '.$message->subject.'<br />
                                To: '.$receiver->first_name.'<br /> '.$message->body
                ]
            ]);
        }

    }

    public function postMessageView($requester = ''){
        $request = \Request::except('_token');
        $this->page_data['message'] = \App\Message::find(\Crypt::decrypt($request['id']));
        $this->page_data['message']->status = ($requester == 'sent')? 0 : 1;
        $this->page_data['message']->save();
        return view('student.mymessage.view')->with($this->page_data);
    }

    public function getMyMessageSent(){
        $this->page_data['message_sent'] = \App\User::find($this->page_data['user']->id)->sender()->sent()->get();
        $this->page_data['profileStats'] = ($this->page_data['user']->profile)?
            $this->page_data['user']->profile()->statistics() : 0;
        $this->page_data['open'] = 'open';
        return view('student.mymessage.sent')->with($this->page_data);
    }

    public function getMyMessageSaved(){
    $this->page_data['message_saved'] = \App\User::find($this->page_data['user']->id)->sender()->draft()->get();
    $this->page_data['profileStats'] = ($this->page_data['user']->profile)?
        $this->page_data['user']->profile()->statistics() : 0;
    $this->page_data['open'] = 'open';
    return view('student.mymessage.saved')->with($this->page_data);
}

    public function getMyMessageDeleted(){
        $this->page_data['message_deleted'] =  \App\User::find($this->page_data['user']->id)->receiver()->onlyTrashed()->get();
        $this->page_data['profileStats'] = ($this->page_data['user']->profile)?
            $this->page_data['user']->profile()->statistics() : 0;
        $this->page_data['open'] = 'open';
        return view('student.mymessage.deleted')->with($this->page_data);
    }

    public function postDeleteMessage(){
        $request = \Request::except('_token');
        if($request['deleteType'] == 'one'){
            $message = \App\Message::find($request['id']);
            $message->delete();
        } else {
            unset($request['DataTables_Table_0_length']);
            unset($request['deleteType']);
            foreach($request as $id){
                $message = \App\Message::find($id);
                $message->delete();
            }
        }
        return json_encode(['url' => url('student/my-message-inbox')]);
    }

    public function postUndo(){
        $request = \Request::except('_token');
        if($request['undoType'] == 'one'){
            $message = \App\Message::withTrashed()->find(\Crypt::decrypt($request['id']));
            $message->restore();
        } else {
            unset($request['DataTables_Table_0_length']);
            unset($request['undoType']);
            foreach($request as $id){
                $message = \App\Message::withTrashed()->find(\Crypt::decrypt($id));
                $message->restore();
            }
        }
        return json_encode(['url' => url('student/my-message-deleted')]);
    }

    public function postForceDelete(){
        $request = \Request::except('_token');
        if($request['deleteType'] == 'one'){
            $message = \App\Message::withTrashed()->find(\Crypt::decrypt($request['id']));
            $message->forceDelete();
        } else {
            unset($request['DataTables_Table_0_length']);
            unset($request['deleteType']);
            foreach($request as $id){
                $message = \App\Message::withTrashed()->find(\Crypt::decrypt($request['id']));
                $message->forceDelete();
            }
        }
        return json_encode(['url' => url('student/my-message-inbox')]);
    }

    public function getMyRecord($startDate = '', $endDate = ''){
        if($startDate && $endDate){
            $this->page_data['histories'] = \App\History::where([
                'user_id' => $this->page_data['user']->id
            ])->whereBetween(
                'created_at', [
                Carbon::createFromTimestamp($startDate),
                Carbon::createFromTimestamp($endDate)
            ])->get();
            $this->page_data['startDate'] =  Carbon::createFromTimestamp($startDate);
            $this->page_data['endDate'] = Carbon::createFromTimestamp($endDate);
        } else {
            $this->page_data['histories'] = \App\History::where([
                'user_id' => $this->page_data['user']->id
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

    public function getMyProfile(){
        $this->page_data['page_name'] = 'profile';
        $this->page_data['profileStats'] = ($this->page_data['user']->profile)?
            $this->page_data['user']->profile()->statistics() : 0;
        $this->page_data['friendsStats'] = $this->page_data['user']->friendship()->requestAccepted()->count();
        $this->page_data['messageStats'] = $this->page_data['user']->receiver()->count();
        return view('student.myprofile.index')->with($this->page_data);
    }

    public function getFriendProfile($id){
        $friend = \App\User::find(\Crypt::decrypt($id));
        $this->page_data['page_name'] = 'profile';
        $this->page_data['friend'] = $friend;
        $this->page_data['profileStats'] = ($friend->profile)?
            $friend->profile()->statistics() : 0;
        $userFriends = $this->page_data['user']->friendship()->requestAccepted()->get();
        $this->page_data['is_friend'] = $this->is_friend($friend->id, $userFriends);
        $this->page_data['friendsStats'] = $friend->friendship()->requestAccepted()->count();
        return view('student.myprofile.friendprofile')->with($this->page_data);
    }

    public function getProcessFriend($id, $type){
        if($type == 'accept'){
            $friendRequest = \App\Friendship::where([
                'user_id' => \Crypt::decrypt($id),
                'friend_id' => $this->page_data['user']->id,
                'status' => 0
            ])->first();

            $friendRequest->status = 1;
            $friendRequest->save();

            $userAcceptance = \App\Friendship::where([
                'user_id' => $this->page_data['user']->id,
                'friend_id' => \Crypt::decrypt($id),
                'status' => 0
            ])->first();

            $userAcceptance->status = 1;
            $userAcceptance->save();
            if($friendRequest && $userAcceptance){
                return redirect()->back()->with('success', 'you are now friends with '.$friendRequest->user->first_name);
            }
            return redirect()->back()->with('error', 'Your friendship acceptance could not be resolved please contact a system administrator');

        }

        if($type == 'unfriend'){
            $request = \App\Friendship::where([
                'user_id' => $this->page_data['user']->id,
                'friend_id' => \Crypt::decrypt($id),
                'status' => 1
            ])->first();
            $request->forceDelete();
            $friendAcceptance = \App\Friendship::where([
                'user_id' => \Crypt::decrypt($id),
                'friend_id' => $this->page_data['user']->id,
                'status' => 1
            ]);
            if($friendAcceptance->count() < 1){
                $friendAcceptance->first()->forceDelete();
            }

            return redirect()->back()->with('message', $request->friend->first_name. 'has been removed successfully from your friends list');
        }

        if($type == 'reject'){
            $request = \App\Friendship::where([
                'user_id' => $this->page_data['user']->id,
                'friend_id' => \Crypt::decrypt($id),
                'status' => 0
            ])->first();
            $request->forceDelete();
            $friendAcceptance = \App\Friendship::where([
                'user_id' => \Crypt::decrypt($id),
                'friend_id' => $this->page_data['user']->id,
                'status' => 0
            ]);
            if($friendAcceptance->count() < 1){
                $friendAcceptance->first()->forceDelete();
            }
            $request->forceDelete();
            return redirect()->back()->with('message', 'you just rejected '.$request->friend->first_name.'\'s friend request');
        }
    }

    private function is_friend($id, $haystack){
        foreach($haystack as $friend){
            if($friend->user_id == $id || $friend->friend_id == $id) return true;
        }
        return false;
    }

    public function postUploadProfileImage(){
        $request = \Request::except('_token');
        $rules = [
            'image' => 'required|max:10000|mimes:png,jpg,jpeg,gif'
        ];

        $validator = \Validator::make($request, $rules);
        if($validator->passes()){
            $file = $request['image'];
            $destination_path = str_replace('\\', '/', storage_path().'/profile_pictures/');
            $file->move($destination_path, $this->page_data['user']->id.'.'.$file->getClientOriginalExtension());
            if(!isset($this->page_data['user']->profile)){
                $profile = new \App\Profile();
                $profile->user_id = $this->page_data['user']->id;
                $profile->save();
            }

            \App\Profile::where([
                'user_id' => $this->page_data['user']->id
            ])->update([
                'image' => $this->page_data['user']->id.'.'.$file->getClientOriginalExtension()
            ]);

            return redirect()->back()->with('message', 'Profile picture changed successfully');
        }
        return redirect()->back()->withErrors($validator->errors())->withInput($request);
    }

    public function getFile($image){

        if(file_exists(str_replace('\\', '/', storage_path().'/profile_pictures/').$image)){
            $path = str_replace('\\', '/', storage_path().'/profile_pictures/').$image;
        } else {
            $path = str_replace('\\', '/', public_path().'/assets/img/team/img32-md.jpg');
        }
        $file = \File::get($path);
        $type = \File::mimeType($path);
        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function postEditView(){
        $request = \Request::except('_token');
        $this->page_data['type'] = $request['type'];
        $this->page_data['hasProfilePicture'] = (isset($this->page_data['user']->profile) &&
            $this->page_data['user']->profile->image !='')? true: false;
        $this->page_data['schools'] = \App\School::all();
        $this->page_data['social_contact_types'] = [
            (object)[
                'id' => 1,
                'code' => 'TWITTER',
                'name' => 'Twitter',
                'description' => 'twitter',
                'icon' => 'rounded-x tw fa fa-twitter',
                'api' => ''
            ],(object)[
                'id' => 2,
                'code' => 'FB',
                'name' => 'Facebook',
                'description' => 'facebook',
                'icon' => 'rounded-x fb fa fa-facebook',
                'api' => ''
            ],(object)[
                'id' => 3,
                'code' => 'G+',
                'name' => 'Google plus',
                'description' => 'google-plus',
                'icon' => 'rounded-x gp fa fa-google-plus',
                'api' => ''
            ]
        ];
        return view('student.myprofile.edit')->with($this->page_data);
    }

    public function postEditProfile(){
        $request = \Request::except('_token');
        if(isset($this->page_data['user']->profile)){
            $profile = \App\Profile::find($this->page_data['user']->profile->id);
            if(isset($request['nick_name']) && $request['nick_name'] != '' && $request['nick_name'] != NULL){
                $profile->nick_name = $request['nick_name'];
            }
            if(isset($request['remove_picture'])){
                $filename = str_replace('\\', '/', storage_path().'/profile_pictures/'). $profile->image;
                if(file_exists($filename)) unlink($filename);
                $profile->image = NULL;
            }
            if(isset($request['description']) && $request['description'] != '' && $request['description'] != NULL){
                $profile->description = $request['description'];
            }
            if(isset($request['phone']) && $request['phone'] != '' && $request['phone'] != NULL){
                $profile->phone = $request['phone'];
            }
            if(isset($request['email']) && $request['email'] != '' && $request['email'] != NULL){
                $profile->email = $request['email'];
            }
            if(isset($request['address']) && $request['address'] != '' && $request['address'] != NULL){
                $profile->address = $request['address'];
            }
            if(isset($request['dofb']) && $request['dofb'] != '' && $request['dofb'] != NULL){
                $profile->dofb = \Carbon\Carbon::createFromTimestamp(strtotime($request['dofb']));
            }

            if(!isset($request['existing_social_contacts']) && $request['type'] == 'social_contact'){
                $profile->social_contact = '';
            }

            if(isset($request['existing_social_contacts']) && $request['existing_social_contacts'] != '' && $request['existing_social_contacts'] != NULL){
                foreach($request['existing_social_contacts'] as $existing_social_contacts){
                    $existing_social_contact_type = get_object_vars(json_decode($existing_social_contacts));
                    foreach($existing_social_contact_type as $name => $detail_obj){
                        $details['name'] = $detail_obj->name;
                        $details['address'] = $detail_obj->address;
                        $details['icon'] = $detail_obj->icon;
                        $existing_social_contact[$name] =  $details;
                    }
                }
                $profile->social_contact = json_encode($existing_social_contact);
            }

            if(isset($request['social_contact_type']) && $request['social_contact_type'] != '' && $request['social_contact_type'] != NULL){
                $existing_social_contact = [];
                if(isset($request['existing_social_contacts']) && $request['existing_social_contacts'] != '' && $request['existing_social_contacts'] != NULL){
                    foreach($request['existing_social_contacts'] as $existing_social_contacts){
                        $existing_social_contact_type = get_object_vars(json_decode($existing_social_contacts));
                        foreach($existing_social_contact_type as $name => $detail_obj){
                            $details['name'] = $detail_obj->name;
                            $details['address'] = $detail_obj->address;
                            $details['icon'] = $detail_obj->icon;
                            $existing_social_contact[$name] =  $details;
                        }
                    }
                }
                $social_contact_type = get_object_vars(json_decode($request['social_contact_type']));
                foreach($social_contact_type as $name => $detail_obj){
                    $details['name'] = $request['social_contact_name'];
                    $details['address'] = $request['social_contact_address'];
                    $details['icon'] = $detail_obj->icon;
                    $social_contact = [
                        $name => $details
                    ];
                    if(!in_array($name,$existing_social_contact))$social_contact = array_merge($existing_social_contact, $social_contact);
                }
                $profile->social_contact = json_encode($social_contact);
            }

            if(!isset($request['existing_education']) && $request['type'] == 'education'){
                $profile->education = '';
                $profile->school_id = 0;
            }

            if(isset($request['school_id']) && $request['school_id'] != '' && $request['school_id'] != NULL){
                $profile->school_id = $request['school_id'];
            }

            if(isset($request['existing_education']) && $request['existing_education'] != '' && $request['existing_education'] != NULL){
                foreach($request['existing_education'] as $existing_education){
                    $existing_education = get_object_vars(json_decode($existing_education));
                    $count = 0;
                    foreach($existing_education as $name => $detail_obj){
                        if($count == 0)$profile->school_id = \App\School::where([
                            'name' => $name
                        ])->first()->id;
                        $details['endDate'] = $detail_obj->endDate;
                        $existing_education[$name] =  $details;
                        $count++;
                    }
                }
                $profile->education = json_encode($existing_education);
            }

            if(isset($request['school_id']) && $request['school_id'] != '' && $request['school_id'] != NULL){
                $existing_education = [];
                if(isset($request['existing_education']) && $request['existing_education'] != '' && $request['existing_education'] != NULL){
                    foreach($request['existing_education'] as $existing_education){
                        $existing_education = get_object_vars(json_decode($existing_education));
                        foreach($existing_education as $name => $detail_obj){
                            $details['endDate'] = $detail_obj->endDate;
                            $existing_education[$name] =  $details;
                        }
                    }
                }
                $school_name = \App\School::find($request['school_id'])->name;
                $details['endDate'] = $request['endDate'];
                $education = [
                    $school_name => $details
                ];
                if(!in_array($school_name,$existing_education))$education = array_merge($existing_education, $education);
                $profile->education = json_encode($education);
            }
            $profile->save();
            return redirect()->back()->with('message', 'social contact added successfully');
        } else {
            $profile = new \App\Profile();
            $profile->user_id = $this->page_data['user']->id;
            $profile->nick_name = isset($request['nick_name'])? $request['nick_name'] : NULL;
            $profile->description = isset($request['description'])? $request['description'] : NULL;
            $profile->phone = isset($request['phone'])? $request['phone'] : NULL;
            $profile->email = isset($request['email'])? $request['email'] : NULL;
            $profile->address = isset($request['address'])? $request['address'] : NULL;
            $profile->dofb = isset($request['dofb'])? \Carbon\Carbon::createFromTimestamp(strtotime($request['dofb'])) : NULL;
            if(isset($request['social_contact_type']) && $request['social_contact_type'] != '' && $request['social_contact_type'] != NULL){
                $social_contact_type = get_object_vars(json_decode($request['social_contact_type']));
                foreach($social_contact_type as $name => $detail_obj){
                    $details['name'] = $request['social_contact_name'];
                    $details['address'] = $request['social_contact_address'];
                    $details['icon'] = $detail_obj->icon;
                    $social_contact = [
                        $name => $details
                    ];
                }
                $profile->social_contact = json_encode($social_contact);
            }
            if(isset($request['school_id']) && $request['school_id'] != '' && $request['school_id'] != NULL){
                $profile->school_id = $request['school_id'];
                $school_name = \App\School::find($request['school_id'])->name;
                $details['endDate'] = $request['endDate'];
                $education = [
                    $school_name => $details
                ];
                $profile->education = $education;
            }
            $profile->save();
            return redirect()->back()->with('message', 'social contact added successfully');
        }
        return redirect()->back()->withErrors();
    }

    public function getMyFriends(){
        $this->page_data['page_name'] = 'friends';
        $this->page_data['profileStats'] = ($this->page_data['user']->profile)?
            $this->page_data['user']->profile()->statistics() : 0;
        $this->page_data['friendsStats'] = $this->page_data['user']->friendship()->requestAccepted()->count();
        $this->page_data['friends'] = $this->page_data['user']->friendship()->requestAccepted()->paginate(6)->setPath('student/lazy-load');
        $this->page_data['friendships'] = $this->page_data['user']->friendship()->requests()->get();
        $this->page_data['messageStats'] = $this->page_data['user']->receiver()->count();
        return view('student.myprofile.friends')->with($this->page_data);
    }

    public function getLazyLoad(){
        $data = $this->page_data['user']->friendship()->requestAccepted()->paginate(6)->chunk(2);
        return \Response::json($data);
    }

    public function postSearch(){
        $request = \Request::except('_token');
        $users = \Search::query($request['searchQuery'])->get('id');
        $list = [];
        foreach($users as $user){
            array_push($list, $user->id);
        }
        $result =\App\User::with('profile', 'friendship', 'school')->whereIn('id', $list)->paginate(6)->chunk(2);
        return $result;
    }

    public function postLoadAutocomplete(){
        $studentUsers = \App\User::where([
            'user_type' => 1
        ])->pluck('first_name');

        return \Response::json($studentUsers);
    }

    public function postFriendshipRequest(){
        $request = \Request::except('_token');
        $friendship = new \App\Friendship();
        $friendship->user_id = $this->page_data['user']->id;
        $friendship->friend_id = $request['friend'];
        $friendship->message = "";
        $friendship->status = 0;
        $friendship->save();

        $friendship = new \App\Friendship();
        $friendship->friend_id = $this->page_data['user']->id;
        $friendship->user_id = $request['friend'];
        $friendship->message = "";
        $friendship->status = 0;
        $friendship->save();

        return \Response::json([
            'message' => 'success'
        ]);
    }

    public function getMyConversations(){
        $this->page_data['page_name'] = 'messages';
        $this->page_data['profileStats'] = ($this->page_data['user']->profile)?
            $this->page_data['user']->profile()->statistics() : 0;
        $this->page_data['friendsStats'] = $this->page_data['user']->friendship()->requestAccepted()->count();
        $this->page_data['conversations'] = $this->page_data['user']->sender()->sentConversation(
            \Carbon\Carbon::now()->startOfMonth()->subMonths(2), \Carbon\Carbon::now()
        )->get()->merge($this->page_data['user']->receiver()->receivedConversation(
            \Carbon\Carbon::now()->startOfMonth()->subMonths(2), \Carbon\Carbon::now()
        )->get());
        $this->page_data['conversationStartDate'] = \Carbon\Carbon::now()->startOfMonth()->subMonths(2);
        $this->page_data['conversationEndDate'] = \Carbon\Carbon::now();
        $this->page_data['messageStats'] = $this->page_data['user']->receiver()->count();
        return view('student.myprofile.conversations')->with($this->page_data);
    }

    public function getMySettings(){
        $this->page_data['page_name'] = 'settings';
        $this->page_data['preferences'] = $this->page_data['user']->preference;
        $this->page_data['profileStats'] = ($this->page_data['user']->profile)?
            $this->page_data['user']->profile()->statistics() : 0;
        $this->page_data['friendsStats'] = $this->page_data['user']->friendship()->requestAccepted()->count();
        $this->page_data['messageStats'] = $this->page_data['user']->receiver()->count();
        return view('student.myprofile.settings')->with($this->page_data);
    }

    public function postUpdatePreferences(){
        $request = \Request::except('_token');

        $options['show_birth_date'] = isset($request['show_birth_date'])? true : false;
        $options['show_phone'] = isset($request['show_phone'])? true : false;
        $options['show_address'] = isset($request['show_address'])? true : false;
        $options['show_notification'] = isset($request['show_notification'])? true : false;
        $options['send_email'] = isset($request['send_email'])? true : false;
        if(isset($this->page_data['user']->preference)){
            \App\Preference::where([
                'user_id' => $this->page_data['user']->id
            ])->update([
                'options' => json_encode($options)
            ]);
        } else {
            \App\Preference::insert([
                'user_id' => $this->page_data['user']->id,
                'options' => json_encode($options),
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

        return redirect()->back()->with('message', 'Your preferences was saved successfully');
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

    public function getNotifications(){
        $notifications = [];
        $messages = $this->page_data['user']->receiver()->unread();
        if($messages->count() > 0) $notifications['messages'] = $messages->orderBy('created_at', 'dsc')->first();

        $friendshipRequest = $this->page_data['user']->friend()->requestPending();
        if($friendshipRequest->count() > 0) $notifications['friendshipRequest'] = $friendshipRequest->orderBy('created_at', 'dsc')->first();
        $otherNotifications = [];
        $profileStats = 'Connect with friends and send private messages by updating your profile. A minimum '.
                        'of 50% profile completion is required to enable messaging and friendship requests';
        if($this->page_data['user']->profile){
            if($this->page_data['user']->profile()->statistics() == 50){
                $profileStats =
                    'You can now send messages and friendship requests to your friends on STUUB-WBT. Go social by sharing your experience'.
                    ' with your friends on facebook, google plus and twitter';
            }elseif($this->page_data['user']->profile()->statistics() > 50 && $this->page_data['user']->profile()->statistics() <= 61){
                $profileStats =
                    'is low if it goes below 50% you will loose the ability to send messages and friendship requests'.
                    ' However you will still have access to your list of friends';

            } elseif($this->page_data['user']->profile()->statistics() > 65){
                $profileStats =
                    'Challenge your friends by inviting them to STUUB-WBT to compete for the leaders board.'.
                    ' Showcase your skills and prove you are the best';
            }
        } else {
            $profileStats = 'Connect with friends and send private messages by updating your profile. A minimum '.
                'of 50% profile completion is required to enable messaging and friendship requests';
        }
        $otherNotifications['profileStats'] = $profileStats;
        $otherNotifications['time'] = \Carbon\Carbon::now()->diffForHumans();
        if(count($otherNotifications) > 0)$notifications['otherNotifications'] =  (object)$otherNotifications;
        return $notifications;
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
            'user_id' => $this->page_data['user']->id
        ])->whereBetween('created_at',[
            Carbon::now()->startOfMonth()->subMonth(),
            Carbon::now()->startOfMonth()
        ])->count();

        $this_month_count = $history::where([
            'user_id' => $this->page_data['user']->id
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

    public function getEncode(){
        $count = 4;
        for($x=0; $x < 50; $x++){
            $faker = \Faker\Factory::create();
            $user = new \App\User();
            $user->email = 'test'.$count.'@stuub.com';
            $user->password = '$2y$10$i8r.KFFGinjtdyQyFbVsc./5q6hpg8XVwqbEix2xibIcGoICAlHve';
            $user->permissions = null;
            $user->last_login = null;
            $user->first_name = $faker->name;
            $user->user_type = 1;
            $user->save();

            \DB::table('activations')->insert([
                'user_id' => $user->id,
                'code' => 'TCgsBav8naOqzdiEeMl9vzkuuKqBgfgj',
                'completed' => 1,
                'completed_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
            $profile = new \App\Profile();
            $profile->user_id = $user->id;
            $profile->nick_name = $faker->name;
            $profile->description = $faker->text;
            $profile->phone = $faker->phoneNumber;
            $profile->email = $faker->email;
            $profile->address = $faker->address;
            $profile->dob = $faker->date('Y-m-d');
            $profile->social_contact = null;
            $profile->school_id = ($count < 102)? $count : $count = 4;
            $profile->education = null;
            $profile->image = null;
            $profile->save();
            $count++;

            $friendship = new \App\Friendship();
            $friendship->user_id = 1;
            $friendship->friend_id = $user->id;
            $friendship->message = $faker->text;
            $friendship->status = 1;
            $friendship->save();
        }
        return 'success';

//        $data = [
//            'twitter' => [
//                'icon' => 'rounded-x tw fa fa-twitter',
//                'name' => 'amina.mustapha',
//                'address' => '#'
//            ],
//            'facebook' => [
//                'icon' => 'rounded-x fb fa fa-facebook',
//                'name' => 'Amina Mustapha',
//                'address' => '#'
//            ]
//        ];
//        return json_encode($data);
    }
}
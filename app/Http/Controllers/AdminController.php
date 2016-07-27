<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    protected $page_data = [];
    public function __construct() {
        $this->middleware('sentinel');
        $this->page_data['currentuser'] = \Sentinel::check();
        if(\Sentinel::check()){
            if($this->page_data['currentuser']->user_type != 2){
                return redirect('web')->send();
            }
        }
        //The User must be someone that can read messages
        $this->page_data['messageUser'] = \App\User::find(1);
        $this->page_data['inbox_count'] = \App\User::find($this->page_data['messageUser']->id)->receiverMessage()->inbox()->count();
        $this->page_data['sent_count'] = \App\User::find($this->page_data['messageUser']->id)->senderMessage()->sent()->count();
        $this->page_data['saved_count'] = \App\User::find($this->page_data['messageUser']->id)->senderMessage()->draft()->count();
        $this->page_data['deleted_count'] = \App\User::find($this->page_data['messageUser']->id)->receiverMessage()->onlyTrashed()->get()->count();

    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('admin.index', $this->page_data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudentManager($page = NULL)
    {
        if($page == NULL){
            $this->page_data['students'] = \App\User::studentUsers();
            return view('admin.studentmanager', $this->page_data);
        }elseif($page = 'active-student'){
            $this->page_data['students'] = \App\User::studentUsers();
            return view('admin.studentmanager', $this->page_data);
            return view('admin.studentmanager', $this->page_data);
        }
        else{
            return redirect('admin/student-manager');
        }

    }

    public function getMyMessageInbox(){
        $this->page_data['message_inbox'] = \App\User::find($this->page_data['messageUser']->id)->receiverMessage()->inbox()->get();
        $this->page_data['profileStats'] = 100;
        $this->page_data['open'] = 'open';
        return view('admin.mymessage.index')->with($this->page_data);
    }

    public function getMyMessageSent(){
        $this->page_data['message_sent'] = \App\User::find($this->page_data['messageUser']->id)->senderMessage()->sent()->get();
        $this->page_data['profileStats'] = 100;
        $this->page_data['open'] = 'open';
        return view('admin.mymessage.sent')->with($this->page_data);
    }

    public function getMyMessageSaved(){
        $this->page_data['message_saved'] = \App\User::find($this->page_data['messageUser']->id)->senderMessage()->draft()->get();
        $this->page_data['profileStats'] = 100;
        $this->page_data['open'] = 'open';
        return view('admin.mymessage.saved')->with($this->page_data);
    }

    public function getMyMessageDeleted(){
        $this->page_data['message_deleted'] =  \App\User::find($this->page_data['messageUser']->id)->receiverMessage()->onlyTrashed()->get();
        $this->page_data['profileStats'] = 100;
        $this->page_data['open'] = 'open';
        return view('admin.mymessage.deleted')->with($this->page_data);
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
                        //Send Inbox with status unread
                        $message = new \App\Message();
                        $message->subject = $request['subject'];
                        $message->body = $request['body'] or '';
                        $message->receiver_id = $id;
                        $message->sender_id = $this->page_data['messageUser']->id;
                        $message->store = 0;
                        $message->status = 0;
                        $message->save();
                    }
                } else {
                    $message = new \App\Message();
                    $message->subject = $request['subject'] or '';
                    $message->body = $request['body'];
                    $message->receiver_id = 0;
                    $message->sender_id = $this->page_data['messageUser']->id;
                    $message->store = 0;
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
                    //Send Inbox with status unread
                    $message = new \App\Message();
                    $message->subject = $request['subject'];
                    $message->body = $request['body'];
                    $message->receiver_id = $id;
                    $message->sender_id = $this->page_data['messageUser']->id;
                    $message->store = 1;
                    $message->status = 0;
                    $message->save();

                    //Save Sent with status 0
                    $message = new \App\Message();
                    $message->subject = $request['subject'];
                    $message->body = $request['body'] or '';
                    $message->receiver_id = $id;
                    $message->sender_id = $this->page_data['messageUser']->id;
                    $message->store = 2;
                    $message->status = 0;
                    $message->save();
                    if(!$message->save()){
                        $message = new \App\Message();
                        $message->subject = $request['subject'];
                        $message->body = $request['body'];
                        $message->receiver_id = $id;
                        $message->sender_id = $this->page_data['messageUser']->id;
                        $message->store = 0;
                        $message->status = 0;
                        $message->save();
                    }
                }
                $status = 'Message was sent successfully';
                return redirect()->back()->with('message', $status);
            }
            return redirect()->back()->withErrors($validator->errors());
        }
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
        return json_encode(['url' => url('admin/my-message-inbox')]);
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
        return json_encode(['url' => url('admin/my-message-deleted')]);
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
        return json_encode(['url' => url('admin/my-message-inbox')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudentProfile($id)
    {
        $this->page_data['student'] = \App\User::find(\Crypt::decrypt($id));
        $this->page_data['inbox_count'] = 0;
        $this->page_data['saved_count'] = 0;
        $this->page_data['inbox'] = $this->page_data['messageUser']->receiverMessage()->inbox(\Crypt::decrypt($id))->get();
       return view('admin.studentprofile', $this->page_data);
        $this->page_data['deleted_count'] = 0;
        //$this->page_data['performances'] = \App\ExamProvider::all();
        $this->page_data['page_name'] = 'profile';
        $this->page_data['profileStats'] = ($this->page_data['user']->profile)?
            $this->page_data['user']->profile()->statistics() : 0;
        $this->page_data['friendsStats'] = $this->page_data['user']->friendship()->count();
        $this->page_data['messageStats'] = $this->page_data['user']->receiver()->count();
        return view('student.myprofile.index')->with($this->page_data);
    }
    
    public function getUsersManagement($id = ' ', $param = ' ')
    {
        $this->page_data['roles'] = \Sentinel::getRoleRepository()->all();
        $this->page_data['modules'] = \App\Module::get();
        if($id == ' ' && $param == ' '){
            $this->page_data['staffs'] = \App\User::staffUsers();
            return view('admin.settings.usermgt.index', $this->page_data);
        }elseif ($param == 'edit'){
            $this->page_data['staff'] = \Sentinel::findUserById(Crypt::decrypt($id));
            return view('admin.settings.usermgt.edit', $this->page_data);
        }elseif($param == 'disable'){

        }else{
            return redirect('admin/users-management');
        }
    }

    public function postUpdateStaffProfile(Request $request){
        $data = $request->only(['staffid', 'first_name', 'email', 'userroles']);
        $user = \Sentinel::findUserById(Crypt::decrypt($data['staffid']));
        $user = \Sentinel::update($user, $data);
        return redirect('admin/users-management');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getWbtManager()
    {
        $this->page_data['exams'] = \App\Exam::publishedExams();
        $this->page_data['examcount'] = \App\Exam::count();
        $this->page_data['providerscount'] = \App\ExamProvider::count();
        $this->page_data['subjectcount'] = \App\Subject::count();
        $this->page_data['categorycount'] = \App\Category::count();
        $this->page_data['sessioncount'] = \App\Session::count();
        $this->page_data['monthcount'] = \App\Month::count();
        return view('admin.wbtmanager', $this->page_data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getExamManager()
    {
        $this->page_data['exams'] = \App\Exam::get();
        return view('admin.exammanager',$this->page_data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAddExam()
    {
        $this->page_data['months'] = \App\Month::get();
        $this->page_data['sessions'] = \App\Session::get();
        $this->page_data['providers'] = \App\ExamProvider::get();
        $this->page_data['subjects'] = \App\Subject::get();
        $this->page_data['instructions'] = \App\Instruction::get();
        return view('admin.addexam',$this->page_data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getExamProfile($id, $param = ' ')
    {
        if($param == ' '){
            $this->page_data['exam'] = \App\Exam::find(\Crypt::decrypt($id));
            $this->page_data['information'] = \App\QuestionAdditionalInformation::all();
            return view('admin.examprofile',$this->page_data );
        }elseif($param == 'edit'){
            $this->page_data['exam'] = \App\Exam::find(\Crypt::decrypt($id));
            $this->page_data['months'] = \App\Month::get();
            $this->page_data['sessions'] = \App\Session::get();
            $this->page_data['providers'] = \App\ExamProvider::get();
            $this->page_data['subjects'] = \App\Subject::get();
            $this->page_data['instructions'] = \App\Instruction::get();
            return view('admin.examprofileedit',$this->page_data );
        }elseif($param == 'update'){
            dd('test3');
        }
        else{
            dd('nothing');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getExamQuestionEdit($id)
    {
        $this->page_data['question'] = \App\Question::find(\Crypt::decrypt($id));
        $this->page_data['exam'] = \App\Exam::find($this->page_data['question']->id);
        $this->page_data['instructions'] = \App\Instruction::get();
        return view('admin.examquestionedit',$this->page_data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postPublishExam(Request $request)
    {
        $data = $request->only(
            'exam'
        );
        $examU = \App\Exam::find($data['exam']);
        $exam['status'] = 1;
        $examU->update($exam);
        return json_encode($data);
    }
    
    public function getSubjectManager()
    {
        $this->page_data['subjects'] = \App\Subject::get();
        $this->page_data['categories'] = \App\Category::get();
        return view('admin.subjectmanager', $this->page_data);
    }

    public function postAddSubject(Request $request)
    {
        $data = $request->only([
            'code', 'name', 'description', 'category_id'
        ]);
        $subject = new \App\Subject();
        $subject = $subject->create($data);

        return redirect('admin/subject-manager');
    }
    
    public function getSubjectExams($id)
    {
        $this->page_data['subject'] = \App\Subject::find(\Crypt::decrypt($id));
        return view('admin.subjectexams', $this->page_data);
    }
    
    public function getProviderManager()
    {
        $this->page_data['providers'] = \App\ExamProvider::all();
        return view('admin.providermanager', $this->page_data);
    }

    public function getCategoryManager()
    {
        $this->page_data['categories'] = \App\Category::all();
        return view('admin.categorymanager', $this->page_data);
    }

    public function getSessionManager()
    {
        $this->page_data['sessions'] = \App\Session::all();
        return view('admin.sessionmanager', $this->page_data);
    }

    public function getMonthManager()
    {
        $this->page_data['months'] = \App\Month::all();
        $this->page_data['providers'] = \App\ExamProvider::all();
        return view('admin.monthmanager', $this->page_data);
    }

    public function postAddMonth(Request $request)
    {
        $data = $request->only([
            'code', 'name', 'exam_provider_id'
        ]);
        $month = new \App\Month();
        $month = $month->create($data);

        return redirect('admin/month-manager');
    }

    public function postAddSession(Request $request)
    {
        $data = $request->only([
            'code', 'name'
        ]);
        $session = new \App\Session();
        $session = $session->create($data);

        return redirect('admin/session-manager');
    }

    public function postAddCategory(Request $request)
    {
        $data = $request->only([
            'code', 'name'
        ]);
        $category = new \App\Category();
        $category = $category->create($data);

        return redirect('admin/category-manager');
    }

    public function getNews($id = NULL)
    {
        if(empty($id)){
            $this->page_data['Cnews'] = \App\News::withTrashed();
            $this->page_data['news'] = \App\News::withTrashed()->get()->chunk(4);
            return view('admin.news.newsindex', $this->page_data);
        }else{
            $this->page_data['newsitem'] = \App\News::find(\Crypt::decrypt($id));
            return view('admin.news.newsitem', $this->page_data);
        }

    }

    public function postPublishNewsItem($id = NULL)
    {
       return true;
    }

    public function getNewsItem($param1 = NULL)
    {
        if($param1 == 'add'){
            $this->page_data['news'] = \App\News::withTrashed()->get()->chunk(4);
            return view('admin.news.addnews', $this->page_data);
        }

    }

    public function postAddNews()
    {
       $formData = \Request::all();

        $news = new \App\News();
        $news->user_id = 1;
        $news->title = $formData['title'];
        $news->caption = $formData['caption'];
        $news->post = $formData['body'];
        $news->status = 0;
        $news->save();
    }

    public function getSchoolsManager(Request $request)
    {
        if($request->session()->get('message')){
            $this->page_data['message'] = $request->session()->get('message');
            $this->page_data['msgtype'] = $request->session()->get('type');
        }
        $this->page_data['schools'] = \App\School::all();
        return view('admin.school.index', $this->page_data);
    }

    public function getSchoolProfile($id)
    {
        $this->page_data['school'] = \App\School::find(\Crypt::decrypt($id));
        $this->page_data['students'] = $this->page_data['school']->profile;
        return view('admin.school.schoolprofile', $this->page_data);
    }

    public function postAddSchool(){
        $formData = \Request::all();

        $school = new \App\School();
        $school->code = $formData['code'];
        $school->name = $formData['name'];
        $school->description = $formData['description'];
        $school->status = 1;
        $school->user_id = 1;
        $school->save();

        return redirect('admin/schools-manager')->with('message', 'School was added successfully');
    }
}

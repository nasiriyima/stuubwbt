<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $page_data = [];
    public function __construct() {
        //$this->middleware('sentinel');
        //$this->page_data['pagegroup'] = 'Aviation';
        $this->page_data['currentuser'] = "User";
        //The User must be someone that can read messages
        $this->page_data['messageUser'] = \App\User::find(1);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('admin.index');
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
        $this->page_data['inbox'] = $this->page_data['messageUser']->receiver()->inbox(\Crypt::decrypt($id))->get();
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
    
    public function getUsersManagement()
    {
        $this->page_data['staffs'] = \App\User::staffUsers();
        $this->page_data['roles'] = \Sentinel::getRoleRepository()->all();
        $this->page_data['modules'] = \App\Module::get();
        return view('admin.settings.usermgt.index', $this->page_data);
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
        return view('admin.subjectmanager', $this->page_data);
    }
    
    public function getSubjectExams($id)
    {
        $this->page_data['subject'] = \App\Subject::find(\Crypt::decrypt($id));
        return view('admin.subjectexams', $this->page_data);
    }
    
    public function getProviderManager()
    {
        return view('admin.providermanager');
    }

    public function getNews($id = NULL)
    {
        if(empty($id)){
            $page_data['Cnews'] = \App\News::withTrashed();
            $page_data['news'] = \App\News::withTrashed()->get()->chunk(4);
            return view('admin.news.newsindex', $page_data);
        }else{
            $page_data['newsitem'] = \App\News::find(\Crypt::decrypt($id));
            return view('admin.news.newsitem', $page_data);
        }

    }

    public function postPublishNewsItem($id = NULL)
    {
       return true;
    }

    public function getNewsItem($param1 = NULL)
    {
        if($param1 == 'add'){
            $page_data['news'] = \App\News::withTrashed()->get()->chunk(4);
            return view('admin.news.addnews', $page_data);
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

    public function postAddRole(){
        $formData = \Request::all();
        $slug = \Sentinel::findRoleBySlug($formData['rslug']);
        if($slug){
            $data['validity'] = 'failed';
            $data['title'] = 'ROLE NOT CREATED';
            $data['message'] = 'Invalid "Slug Name",';
        }else{
            $data['validity'] = 'sucess';

        }
        return json_encode($data);
    }
}

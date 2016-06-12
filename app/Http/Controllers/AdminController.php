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
    public function getStudentManager()
    {
        $this->page_data['students'] = \App\User::studentUsers();
        return view('admin.studentmanager', $this->page_data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudentProfile($id)
    {
        $this->page_data['student'] = \App\User::find(\Crypt::decrypt($id));
        $this->page_data['performances'] = \App\ExamProvider::all();
        return view('admin.studentprofile', $this->page_data);
    }
    
    public function getUsersManagement()
    {
        $this->page_data['students'] = \App\User::staffUsers();
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
    public function getExamProfile($id)
    {
        $this->page_data['exam'] = \App\Exam::find(\Crypt::decrypt($id));
        $this->page_data['information'] = \App\QuestionAdditionalInformation::all();
        return view('admin.examprofile',$this->page_data );
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
            $page_data['news'] = \App\News::withTrashed()->get()->chunk(4);
            return view('admin.news.newsindex', $page_data);
        }else{
            $page_data['newsitem'] = \App\News::find(\Crypt::decrypt($id));
            dd('item view');
        }

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
}

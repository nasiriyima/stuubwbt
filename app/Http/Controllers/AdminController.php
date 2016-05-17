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
        return view('admin.studentmanager');
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
        return view('admin.examprofile',$this->page_data );
    }
    
    public function getSubjectManager()
    {
        return view('admin.subjectmanager');
    }
    
    public function getProviderManager()
    {
        return view('admin.providermanager');
    }
}

<?php

namespace App\Http\Controllers;

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
    Public function postAddExaminationQuestion(){
        $formData = \Request::all();
        dd($formData);
    }
}

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
    public function getLogin()
    {
        return view('frontweb.login');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignUp()
    {
        return view('frontweb.register');
    }
}

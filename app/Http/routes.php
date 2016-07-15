<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/web');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
//    \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//        var_dump($query->sql);
//        var_dump($query->bindings);
//        var_dump($query->time);
//    });
    Route::controllers([
        'app'       => 'AppController',
        'web'       => 'WebController',
        'admin'     => 'AdminController',
        'email'     => 'EmailController',
        'student'   => 'StudentController',
        'wbt'       => 'CBTController',
        'auth'      => 'AuthController'
    ]);
});

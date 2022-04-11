<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AdminController;

use App\Student;
use App\Teacher;
use App\Assignment;
use App\Admin;




Route::get('/', function () {

    
    return view('welcome');

});

Route::get('/register','StudentController@index');
Route::post('/register','StudentController@register');
Route::get('/student/view','StudentController@view'); //admin functionality
Route::get('/login','StudentController@loginview');
Route::post('/login','StudentController@login');
Route::get('/home', function () {

    return view('homepage');

});

Route::get('/student/delete/{student_id}','StudentController@delete')->name('student.delete');
Route::get('/student/edit/{student_id}','StudentController@edit')->name('student.edit');
Route::post('/student/update/{student_id}','StudentController@update')->name('student.update');



// teacher's routes

Route::get('/tregister','TeacherController@index');
Route::post('/tregister','TeacherController@register');
Route::get('/tlogin','TeacherController@loginview');
Route::post('/teacher/view','TeacherController@login');
Route::get('/link','TeacherController@login');
Route::get('/teacherpersonal-view','TeacherController@view');
Route::get('/students','TeacherController@mystudentsview');



Route::get('/teacher/view','TeacherController@login');

Route::get('/teacher/delete/{teacher_id}','TeacherController@delete')->name('teacher.delete');
Route::get('/teacher/edit/{teacher_id}','TeacherController@edit')->name('teacher.edit');
Route::post('/teacher/update/{teacher_id}','TeacherController@update')->name('teacher.update');



//assignment

Route::get('/assignment','AssignmentController@index');
Route::post('/assignment','AssignmentController@assign');

Route::get('/viewassignment','AssignmentController@view');
Route::get('/adminassignment','AssignmentController@adminview');



//teacher logout_route
Route::get('/logout', function () {

    if(session()->has('email'))
    {
        session()->pull('email',null);
    }

    
    return redirect('home');

});

//slogout

Route::get('/slogout', function () {

    if(session()->has('email'))
    {
        session()->pull('email',null);
    }

    
    return redirect('home');

});

// login_route

Route::get('/tlogin', function () {

    if(session()->has('email'))
    {
        return redirect('tlogin');
    }

    
    return view('tlogin');

});

//admin
Route::get('/alogin','AdminController@loginview');
Route::post('/alogin','AdminController@login');

Route::get('/helloadmin', function () {

    return view('helloadmin');

});

Route::get('/teacheradminview','AdminController@teacheradminview');

Route::get('/alogout', function () {

    if(session()->has('email'))
    {
        session()->pull('email',null);
    }

    
    return redirect('home');

});





















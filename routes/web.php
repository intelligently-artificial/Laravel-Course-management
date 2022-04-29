<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register','StudentController@create');
Route::post('/register','StudentController@store');
Route::get('/login','StudentController@loginview');
Route::post('/login','StudentController@login');
Route::get('/home', function () {
    return view('homepage');
});

Route::get('/tregister','TeacherController@create');  
Route::post('/tregister','TeacherController@store');
Route::get('/tlogin','TeacherController@loginview');
Route::post('/teacher/view','TeacherController@login');

Route::group(['middleware'=>'check'],function()
{
Route::get('/student/delete/{student_id}','StudentController@destroy')->name('student.delete');
Route::get('/student/edit/{student_id}','StudentController@edit')->name('student.edit');
Route::post('/student/update/{student_id}','StudentController@update')->name('student.update');
Route::get('/link','TeacherController@login');
Route::get('/teacherpersonal-view','TeacherController@show');
Route::get('/students','TeacherController@mystudentsview');
Route::get('/teacher/view','TeacherController@login');
Route::get('/teacher/delete/{teacher_id}','TeacherController@destroy')->name('teacher.delete');
Route::get('/teacher/edit/{teacher_id}','TeacherController@edit')->name('teacher.edit');
Route::post('/teacher/update/{teacher_id}','TeacherController@update')->name('teacher.update');
Route::get('/assignment','AssignmentController@index');
Route::post('/assignment','AssignmentController@assign');
Route::get('/viewassignment','AssignmentController@view');
Route::get('/adminassignment','AssignmentController@adminview');
Route::get('/teacheradminview','AdminController@teacheradminview') -> name('teacher');
Route::get('/student/view','StudentController@view') -> name('student');
});
Route::get('/logout', function () {

    if(session()->has('email'))
    {
        session()->flush();
    }
    return redirect('home');

});
Route::get('/tlogin', function () {

    if(session()->has('email'))
    {
        return redirect('tlogin');
    }
    return view('tlogin');
});
Route::get('/alogin','AdminController@loginview');
Route::post('/alogin','AdminController@login');
Route::get('/helloadmin','AdminController@helloadmin')-> middleware('check');



























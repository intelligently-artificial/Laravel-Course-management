<?php
use Illuminate\Support\Facades\Route;

Route::get('/register','StudentController@create');
Route::post('/register','StudentController@store');
Route::get('/login','StudentController@loginView');
Route::post('/login','StudentController@login');
Route::get('/home','StudentController@homePage');

Route::get('/teacher/register','TeacherController@create');  
Route::post('/teacher/register','TeacherController@store');
Route::get('/teacher/login','TeacherController@loginView');
Route::post('/teacher/view','TeacherController@login');

Route::group(['middleware'=>'check'],function()
{
    Route::delete('/student/gone/{student_id}','StudentController@destroy')->name('student.delete');
    Route::get('/student/do/{student_id}','StudentController@edit')->name('student.edit');
    Route::put('/student/update/{student_id}','StudentController@update')->name('student.update');
    Route::get('/link','TeacherController@login');
    Route::get('/teachers/view','TeacherController@show');
    Route::get('/students','TeacherController@myStudentsView');
    Route::get('/teacher/view','TeacherController@login');
    Route::delete('/teacher/gone/{teacher_id}','TeacherController@destroy')->name('teacher.delete');
    Route::get('/teacher/do/{teacher_id}','TeacherController@edit')->name('teacher.edit');
    Route::put('/teacher/update/{teacher_id}','TeacherController@update')->name('teacher.update');
    Route::get('/assignment','AssignmentController@index');
    Route::post('/assignment','AssignmentController@assign');
    Route::get('/view/assignment','AssignmentController@view');
    Route::get('/admin/assignment','AssignmentController@adminView');
    Route::get('/teacher/admin/view','AdminController@teacherAdminView')->name('teacher');
    Route::get('/student/view','StudentController@studentView')->name('student');
});

Route::get('/logout','StudentController@logout');
Route::get('/admin/login','AdminController@loginView');
Route::post('/admin/login','AdminController@login');
Route::get('/hello/admin','AdminController@helloAdmin')->middleware('check');



























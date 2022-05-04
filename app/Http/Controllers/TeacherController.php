<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherLoginRequest;

class TeacherController extends Controller
{
    public function create(){ 
        return view('teacherRegistration');
    }

    public function store(TeacherRequest $request){
        $request->validate();

        $name       = $request->input('name');
        $course     = $request->input('course');
        $email      = $request->input('email');
        $password   = $request->input('password');
        $experience = $request->input('experience');
        $number     = $request->input('number');
        $gender     = $request->input('gender');

        try{    
            Teacher::register($name , $course , $email , $password , $experience , $number , $gender);
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }

        return view('teacherLogin');   
    }

    public function loginView(){
        return view('teacherLogin');
    }
    
    public function login(TeacherLoginRequest $request){
        $request->validate();

        $email    = $request->input('email');
        $password = $request->input('password');

        try{    
            $check=Teacher::login($email , $password);
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }

        if(count($check)>0){
            try{ 
                $teacher = Teacher::teacherDetails();
        }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
        }

            $request->session()->put('email',$email);
            $data=compact('teacher');
        }

        if(isset($data)){
            return view('teacherView')->with($data);
        }   
        else{
            return view('wrongCredentials');
        }  
    } 

    public function show(){  
        try{   
            $teacher = Teacher::teacherDetails();
            $me=Teacher::show();
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }
        $data=compact('teacher','me');

        return view('teacherView')->with($data);        
    }

    public function myStudentsView(){
        try{    
            $student = Student::studentDetails();
            $me=Teacher::myStudentView();     
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }
        
        return view('teacherStudentView',compact('student','me'));
    }

    public function destroy($id){
        if(!empty($id)){
            try{
                Teacher::deleteTeacher($id);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
        }
        return redirect()->back();  
    } 

    public function edit($id){
        if(!empty($id)){
            try{
                $teacher = Teacher::edit($id);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
        }
        $url=url('/teacher/update') ."/". $id ;
        $data=compact('teacher','url');

        return view('teacherUpdation')->with($data);   
    }

    public function update($id,Request $request){
        if(!empty($id)){

            $name   = $request->input('name');
            $email  = $request->input('email');
            $course = $request->input('course');
            $number = $request->input('number');
            $gender = $request->input('gender');
            try{
                Teacher::updateTeacher($id , $name , $email , $course , $number , $gender);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
        }
        return redirect('/teacher/admin/view');
    }
    
}

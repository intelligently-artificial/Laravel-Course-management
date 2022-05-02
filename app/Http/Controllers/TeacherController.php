<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    public function create(){ 
        return view('teacherregistration');
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
            Teacher::register($name,$course,$email,$password,$experience,$number,$gender);
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }

        return view('tlogin');   
    }

    public function loginview(){
        return view('tlogin');
    }
    
    public function login(Request $request){
        $email    = $request->input('email');
        $password = $request->input('password');

        try{    
            $check=Teacher::login($email,$password);
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }

        if(count($check)>0){
            $teacher=Teacher::all();
            $request->session()->put('email',$email);
            $data=compact('teacher'); 
        }

        if(isset($data)){
            return redirect('teacherpersonal-view')->with($data);
        }   
        else{
            echo "Wrong credentials!";
        }  
    } 

    public function show(){  
        try{   
            $teacher = Teacher::all();
            $me=Teacher::show();
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }
        $data=compact('teacher','me');

        return view('teacherpersonal-view')->with($data);        
    }

    public function mystudentsview(){
        try{    
            $student = Student::all();
            $me=Teacher::mystudentview();     
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }
        return view('teacherstudentview',compact('student','me'));
    }

    public function destroy($id){
        if(!empty($id)){
            try{
                Teacher::deleteteacher($id);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
        }
        return redirect()->back();  
    } 

    public function edit($id){
        if(!empty($id)){
            try{
                $teacher=Teacher::edit($id);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
        }
        $url=url('/teacher/update') ."/". $id ;
        $data=compact('teacher','url');

        return view('teacherupdation')->with($data);   
    }

    public function update($id,Request $request){
        if(!empty($id)){

            $name   = $request->input('name');
            $email  = $request->input('email');
            $course = $request->input('course');
            $number = $request->input('number');
            $gender = $request->input('gender');
            try{
                Teacher::updates($id,$name,$email,$course,$number,$gender);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
        }
        return redirect('/teacheradminview');
    }
    
}

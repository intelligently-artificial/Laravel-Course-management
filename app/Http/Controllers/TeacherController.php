<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;

class TeacherController extends Controller
{
    public function index(){
        
        return view('teacherregistration');
    }

    public function register(Request $request){
        $request->validate(
            [
               'name' => 'required',
               'course' => 'required',
               'experience' => 'required',
               'gender' => 'required', 
               'number' => 'required',
               'email' => 'required|email',
               'password' => 'required'
            
            ]
            );

           
            

       
        //call that function that you have made in teacher model
        //make an array and pass that array
        
        $name=$request->input('name');
        $course=$request->input('course');
        $email=$request->input('email');
        $password=$request->input('password');
        $experience=$request->input('experience');
        $number=$request->input('number');
        $gender=$request->input('gender');

        Teacher::register($name,$course,$email,$password,$experience,$number,$gender);
        
       

        return view('tlogin');
        
    }

    public function loginview()
    {
      return view('tlogin');
    }
    
    public function login(Request $request)
    {
       $email=$request->input('email');
        $password=$request->input('password');
        $data=Teacher::login($email,$password,$request);


        if(isset($data))
        {
            return redirect('teacherpersonal-view')->with($data);
        }

        else{echo "Wrong credentials!";}
     
    } 

    public function view()
    {
        if(session()->has('email')){
        $teacher = Teacher::all();
        $me=Teacher::where('email',session('email'))->get();

        $data=compact('teacher','me');
        return view('teacherpersonal-view')->with($data);}
        else return view('tlogin');
    }

    public function mystudentsview()
    {
        if(session()->has('email'))
        {
        
        $teacher = Teacher::all();
        $student = Student::all();
        $me=Teacher::where('email',session('email'))->get();

        $data=compact('teacher','student','me');
         
        return view('teacherstudentview')->with($data);
    }

        else return view('tlogin');
    }

    public function delete($id)
    {
        Teacher::del($id);
       
        return redirect()->back();
        
    } 

    public function edit($id)
    {
        $data=Teacher::edit($id);
        
        return view('teacherupdation')->with($data);


        
    }

    public function update($id,Request $request)
    {
        Teacher::upd($id,$request);
        
        return redirect('/teacheradminview');
    }
}

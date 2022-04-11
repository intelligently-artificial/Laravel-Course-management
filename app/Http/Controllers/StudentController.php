<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\Assignment;

class StudentController extends Controller
{
    public function index(){
        
        return view('studentregistration');
    }

    public function register(Request $request){
        $request->validate(
            [
               'name' => 'required',
               'course' => 'required',
               'gender' => 'required', 
               'number' => 'required',
               'email' => 'required|email',
               'password' => 'required'
            
            ]
            );

            $name=$request->input('name');
            $course=$request->input('course');
            $email=$request->input('email');
            $password=$request->input('password');
            
            $number=$request->input('number');
            $gender=$request->input('gender');
    
            Student::register($name,$course,$email,$password,$number,$gender);

        return view('login');
        
    }

    public function loginview()
    {
      return view('login');
    }
    
    public function login(Request $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');
        $data=Student::login($email,$password,$request);


        if(isset($data))
        {
            return view('studentpersonal-view')->with($data);
        }

        else{echo "Wrong credentials!";}


     

      
    } 

    public function view(Request $request)
    {
        if(session()->has('email'))
        {
          $search=$request['search']??"";
          $data=Student::view($search);
          return view('student-view')->with($data);
        }
        else return view('alogin');


       
    }

    public function delete($id)
    {
        Student::del($id);
       
        return redirect()->back();
    } 

    public function edit($id)
    {
        $data=Student::edit($id);
       
        return view('studentupdation')->with($data);


        
    }

    public function update($id,Request $request)
    {
        Student::upd($id,$request);
       
        return redirect('/student/view');
    }
  
}

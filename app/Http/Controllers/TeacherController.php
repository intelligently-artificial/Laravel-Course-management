<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    public function index(){
        
        return view('teacherregistration');
    }

    public function register(TeacherRequest $request)
    {
        

               $request->validate();
               $name=$request->input('name');
               $course=$request->input('course');
               $email=$request->input('email');
               $password=$request->input('password');
               $experience=$request->input('experience');
               $number=$request->input('number');
               $gender=$request->input('gender');
               try{    
    
                Teacher::register($name,$course,$email,$password,$experience,$number,$gender);
            }
            catch(\Exception $exception)
            {
                return view('error')->with('error',$exception->getMessage());
            }
               return view('tlogin');
          
          
        
    }

    public function loginview()
    {
        return view('tlogin');
    }
    
    public function login(Request $request)
    {
        
             $helper=$request;
             $email=$request->input('email');
             $password=$request->input('password');
             try{    
    
                $data=Teacher::login($email,$password,$helper);
            }
            catch(\Exception $exception)
            {
                return view('error')->with('error',$exception->getMessage());
            }
                
    
            
          


             if(isset($data))
             {
                 return redirect('teacherpersonal-view')->with($data);
             }

             else{echo "Wrong credentials!";}
        
        
     
    } 

    public function view()
    {  
        try{    
    
            $teacher = Teacher::all();
            $me=Teacher::where('email',session('email'))->get();
    
        }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
       
        
                 
                  $data=compact('teacher','me');
                  return view('teacherpersonal-view')->with($data);
            
            
        
    }

    public function mystudentsview()
    {
        try{    
    
            $student = Student::all();
            $me=Teacher::where('email',session('email'))->get();        }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
        
        
        
       

        $data=compact('student','me');
         
        return view('teacherstudentview')->with($data);
    

        
    }
    public function check($id)
    {
        if(empty($id)||!in_array($id))
        {
           return view('error');
        }

    }

    public function delete($id)
    {
        Teacher::deletes($id);
       
        return redirect()->back();  //try catch or validation function
        
    } 

    public function edit($id)
    {
        
        
        $data=Teacher::edit($id);
        
        return view('teacherupdation')->with($data);


        
    }

    public function update($id,Request $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $course=$request->input('course');
        $number=$request->input('number');
        $gender=$request->input('gender');
        
        Teacher::updates($id,$name,$email,$course,$number,$gender);
        
        return redirect('/teacheradminview');
    }
}

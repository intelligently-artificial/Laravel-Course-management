<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Assignment;

class Student extends Model
{
    protected $table="student";
    protected $primaryKey="student_id";

    public static function register($name,$course,$email,$password,$number,$gender)
    {
        $c=new Student;
        //call that function that you have made in teacher model
        //make an array and pass that array
        
        $c->name=$name;

        $c->course=$course;


        $c->email=$email;

        $c->password=$password;

      
        $c->number=$number;
        $c->gender=$gender;
        
        $c->save();

    }

    public static function login($email,$password,$request)
    {
       
        $check=Student::where(['email'=>$email,'password'=>$password])->get();
        if(count($check)>0)
        {
         $student=Student::where('email',$request->input('email'))->get();
         $use=$request->input('email');
         $request->session()->put('email',$use);
         
   
         $assignment = Assignment::all();
         
   
         $data=compact('student','assignment');
         

   
         return $data; 
         }
        else{
          return;
             
          
           }
    }

    public static function view($search)
    {
        if($search != "")
        {
            $student=Student::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->get();

        }
        else
        {
          $student = Student::all();
      }
        $data=compact('student','search');
        return $data;

    }

    public static function del($id)
    {
        Student::find($id)->delete();
        return;

    }
    public static function edit($id)
    {
        $student=Student::find($id);
        $url=url('/student/update') ."/". $id ;
        
        $data=compact('student','url');
        return $data;

    }

    public static function upd($id,$request)
    {
        $c=Student::find($id);

        $c->name=$request->input('name');

        $c->email=$request->input('email');


        $c->course=$request->input('course');
        $c->number=$request->input('number');
        $c->gender=$request->input('gender');
        
        $c->save();

    }


}
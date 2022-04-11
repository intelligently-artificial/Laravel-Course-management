<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table="teacher";
    protected $primaryKey="teacher_id";


    public static function register($name,$course,$email,$password,$experience,$number,$gender) 
    {
        $c=new Teacher();
        //call that function that you have made in teacher model
        //make an array and pass that array
        
        $c->name=$name;

        $c->course=$course;


        $c->email=$email; //nc

        $c->password=$password;

        $c->experience=$experience;
        $c->number=$number;
        $c->gender=$gender;
        
        $c->save();

    }

    public static function login($email,$password,$request)
    {
       
        $check=Teacher::where(['email'=>$email,'password'=>$password])->get();
        if(count($check)>0)
        {
         $teacher=Teacher::all();
         $use=$request->input('email');
         $request->session()->put('email',$use);
         
   
        
         
   
         $data=compact('teacher');
         

   
         return $data; 
         }
        else{

              return;
             
          
           }
    }

    public static function del($id)
    {
        Teacher::find($id)->delete();
        return ;
    }

    public static function edit($id)
    {
        $teacher=Teacher::find($id);
        $url=url('/teacher/update') ."/". $id ;
        
        $data=compact('teacher','url');
        return $data;
    }
    public static function upd($id,$request)
    {
        $c=Teacher::find($id);

        $c->name=$request->input('name');

        $c->email=$request->input('email');


        $c->course=$request->input('course');
        $c->number=$request->input('number');
        $c->gender=$request->input('gender');
        
        $c->save();
    }

   




    

}

// make a function add teacher



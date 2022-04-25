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
        
        
        $c->name=$name;

        $c->course=$course;


        $c->email=$email; 

        $c->password=$password;

        $c->experience=$experience;
        $c->number=$number;
        $c->gender=$gender;
        
        $c->save();

    }

    public static function login($email,$password,$helper)
    {
       
        $check=Teacher::where(['email'=>$email,'password'=>$password])->get();
        if(count($check)>0)
        {
         $teacher=Teacher::all();
         $use=$email;
         $helper->session()->put('email',$use);
         $data=compact('teacher');
         

   
         return $data; 
         }
         
        else{
                return;
            }
    }

    public static function deletes($id)
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
    public static function updates($id,$name,$email,$course,$number,$gender)
    {
        $c=Teacher::find($id);

        $c->name=$name;

        $c->email=$email;


        $c->course=$course;
        $c->number=$number;
        $c->gender=$gender;
        
        $c->save();
    }

   




    

}

// make a function add teacher



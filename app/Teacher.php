<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table="teacher";
    protected $primaryKey="teacher_id";

    public static function register($name , $course , $email , $password , $experience , $number , $gender){
        if((!empty($name)) && (!empty($email)) && (!empty($course)) && (!empty($password)) && (!empty($number)) && (!empty($gender)) && (!empty($experience))){

            $register=new Teacher();
    
            $register->name       = $name;
            $register->course     = $course;
            $register->email      = $email; 
            $register->password   = $password;
            $register->experience = $experience;
            $register->number     = $number;
            $register->gender     = $gender;

            return $register->save();
        }
    }

    public static function login($email,$password){
        if((!empty($email)) && (!empty($password))){
            $check=Self::where(['email'=>$email,'password'=>$password])->get();
            return $check;
        }
    }

    public static function deleteTeacher($id){
        if(!empty($id)){
            Self::find($id)->delete();
        }  
    }

    public static function edit($id){
        if(!empty($id)){
            $teacher=Self::find($id);
            return $teacher;
        }
    }

    public static function updateTeacher($id , $name , $email , $course , $number , $gender){
        if((!empty($name)) && (!empty($email)) && (!empty($course)) && (!empty($id)) && (!empty($number)) && (!empty($gender))){
            $register=Self::find($id);
    
            $register->name   = $name;
            $register->email  = $email;
            $register->course = $course;
            $register->number = $number;
            $register->gender = $gender;
    
            return $register->save();
        }
    }
    public static function myStudentView(){
        $teacher=Self::where('email',session('email'))->get();
        return $teacher;
    }

    public static function show(){
        $teacher=Self::where('email',session('email'))->get();
        return $teacher;
    }

    public static function assignment(){
        $teacher=Self::where('email',session('email'))->get();
        return $teacher;
    }

    public static function course(){
        $teacher=Self::where('email',session('email'))->get();
        return $teacher;
    }

    public static function teacherDetails(){
        $teacher=Self::all();
        return $teacher;
    }

}





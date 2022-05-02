<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table="teacher";
    protected $primaryKey="teacher_id";

    public static function register($name,$course,$email,$password,$experience,$number,$gender){
        $c=new Teacher();

        $c->name       = $name;
        $c->course     = $course;
        $c->email      = $email; 
        $c->password   = $password;
        $c->experience = $experience;
        $c->number     = $number;
        $c->gender     = $gender;

        $c->save();
    }

    public static function login($email,$password){
        $check=Teacher::where(['email'=>$email,'password'=>$password])->get();
        return $check;
    }

    public static function deleteteacher($id){
        Teacher::find($id)->delete();
    }

    public static function edit($id){
        $teacher=Teacher::find($id);
        return $teacher;
    }

    public static function updates($id,$name,$email,$course,$number,$gender){
        $c=Teacher::find($id);

        $c->name   = $name;
        $c->email  = $email;
        $c->course = $course;
        $c->number = $number;
        $c->gender = $gender;

        $c->save();
    }
    public static function mystudentview(){
        $teacher=Teacher::where('email',session('email'))->get();
        return $teacher;
    }

    public static function show(){
        $teacher=Teacher::where('email',session('email'))->get();
        return $teacher;
    }

    public static function assignment(){
        $teacher=Teacher::where('email',session('email'))->get();
        return $teacher;
    }

    public static function course(){
        $teacher=Teacher::where('email',session('email'))->get();
        return $teacher;
    }

}





<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Assignment;

class Student extends Model
{
    protected $table="student";
    protected $primaryKey="student_id";

    public static function register($name,$course,$email,$password,$number,$gender){
        $c=new Student;

        $c->name     = $name;
        $c->course   = $course;
        $c->email    = $email;
        $c->password = $password;
        $c->number   = $number;
        $c->gender   = $gender;

        $c->save();
    }

    public static function checklogin($email){
        $check=Student::where('email',$email)->get();
        return $check;        
    }

    public static function login($email,$password){
        $login=Student::where(['email'=>$email,'password'=>$password])->get();
        return $login;       
    }

    public static function studentview($search){
        $student=Student::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->paginate(5);
        return $student;
    }

    public static function deletestudent($id){
        Student::find($id)->delete();
    }

    public static function edit($id){
        $student=Student::find($id);
        return $student;
    }
    

    public static function updates($id,$name,$email,$course,$number,$gender){
        $c=Student::find($id);

        $c->name=$name;
        $c->email=$email;
        $c->course=$course;
        $c->number=$number;
        $c->gender=$gender;

        $c->save();

    }

    public static function new(){
        $data=Student::join('assignment', 'student.course', '=', 'assignment.course')
        ->join('teacher', 'teacher.course', '=', 'assignment.course')
        ->select('student.email', 'teacher.name', 'assignment.assignment','student.course')
        ->get();
        return $data;
    }


}

<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Assignment;

class Student extends Model
{
    protected $table="student";
    protected $primaryKey="student_id";

    public static function register($name , $course , $email , $password , $number , $gender){
        if((!empty($name)) && (!empty($email)) && (!empty($course)) && (!empty($password)) && (!empty($number)) && (!empty($gender)) && (!empty($experience))){


            $register=new Student;
    
            $register->name     = $name;
            $register->course   = $course;
            $register->email    = $email;
            $register->password = $password;
            $register->number   = $number;
            $register->gender   = $gender;
    
            return $register->save();
        }
    }

    public static function checkLogin($email){
        if(!empty($email)){
            $check=Self::where('email',$email)->get();
            return $check; 
        }       
    }

    public static function login($email,$password){
        if(!empty($email) && (!empty($password))){
            $login=Self::where(['email'=>$email,'password'=>$password])->get();
            return $login;   
        }    
    }

    public static function studentView($search){
        if(!empty($search)){
            $student=Self::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->paginate(2);
            return $student;
        }
    }

    public static function deleteStudent($id){
        if(!empty($id)){
            Self::find($id)->delete();// try to return
        }
    }

    public static function edit($id){
        if(!empty($id)){
            $student=Self::find($id);
            return $student;
        }
    }
    

    public static function updateStudent($id , $name , $email , $course , $number , $gender){
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

    public static function new(){
        $data=Self::select('student.email', 'teacher.name', 'assignment.assignment','student.course')
        ->join('assignment', 'student.course', '=', 'assignment.course')
        ->join('teacher', 'teacher.course', '=', 'assignment.course')
        ->get();
        return $data;
    }

    public static function studentDetails(){
        $student=Self::all();
        return $student;
    }

    public static function pagination(){
        $student=Self::paginate(2);
        return $student;
    }

}

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
        $c->name=$name;
        $c->course=$course;
        $c->email=$email;
        $c->password=$password;
        $c->number=$number;
        $c->gender=$gender;
        $c->save();
    }

    public static function login($email,$password,$helper)
    {
       
        $check=Student::where(['email'=>$email,'password'=>$password])->get();
        if(count($check)>0)
        {
         $student=Student::where('email',$email)->get();
         $helper->session()->put('email',$email);
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

    public static function deletes($id)
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
    

    public static function updates($id,$name,$email,$course,$number,$gender)
    {
        
        $c=Student::find($id);
        $c->name=$name;
        $c->email=$email;
        $c->course=$course;
        $c->number=$number;
        $c->gender=$gender;
        $c->save();

    }

    public static function new()

    {

        $data=Student::join('assignment', 'student.course', '=', 'assignment.course')
        ->join('teacher', 'teacher.course', '=', 'assignment.course')
        ->select('student.email', 'teacher.name', 'assignment.assignment','student.course')
        ->get();
        return $data;

    }


}

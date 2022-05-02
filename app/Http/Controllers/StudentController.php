<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\Assignment;
use App\Http\Requests\StudentRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class StudentController extends Controller
{
    public function create(){
        return view('studentregistration');
    }

    public function store(StudentRequest $request){
        $request->validate();

        $name     = $request->input('name');
        $course   = $request->input('course');
        $email    = $request->input('email');
        $password = $request->input('password');
        $number   = $request->input('number');
        $gender   = $request->input('gender');

        try{ 
            Student::register($name,$course,$email,$password,$number,$gender);
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }
        return view('login');    
    }

    public function loginview(){
      return view('login');
    }
    
    public function login(Request $request){
        $email    = $request->input('email');
        $password = $request->input('password');

        try{  
            $check = Student::login($email,$password);
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }

        if(count($check)>0){
            try{  
                $student=Student::checklogin($email);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
            $request->session()->put('email',$email);
            $assignment = Assignment::all();
            $data=compact('student','assignment'); 
        }

        if(isset($data)){
            return view('studentpersonal-view')->with($data);
        }
        else{echo "Wrong credentials!";}
    } 

    public function studentview(Request $request){
        $search=$request['search']??"";

        if(empty($search)){
            try{    
                $student = Student::paginate(5);        
            }catch(\Exception $exception){
             return view('error')->with('error',$exception->getMessage());
            }     
        }
        
        try{    
               $student = Student::studentview($search);        
            }catch(\Exception $exception){
             return view('error')->with('error',$exception->getMessage());
            } 
         
        return view('student-view',compact('student','search'));
    }

    public function destroy($id){
        if(!empty($id)){
            try{
                Student::deletestudent($id);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
        }
        return redirect()->back();
    } 

    public function edit($id){
        if(!empty($id)){
            try{
                $student = Student::edit($id);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
        }
        $url=url('/student/update') ."/". $id ;
        $data=compact('student','url');

        return view('studentupdation')->with($data);
    }

    public function update($id,Request $request){
        if(!empty($id)){
            $name   = $request->input('name');
            $email  = $request->input('email');
            $course = $request->input('course');
            $number = $request->input('number');
            $gender = $request->input('gender');
        
            try{    
                Student::updates($id,$name,$email,$course,$number,$gender);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage()); 
            }
        }
        return redirect('/student/view');
    }

    public function new(Request $request){
        try{    
            $data = Student::new();
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage()); 
        }
        $filter_data = [];
        foreach($data as $row){

            array_push($filter_data, $row);
        }
        $count = count($filter_data);
        $page = $request->page;
        $perPage = 10;
        $offset = ($page-1) * $perPage;
        $data = array_slice($filter_data, $offset, $perPage);
        $data = new Paginator($data, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);
        return view('new',['data' => $data]);
    }

    public static function homepage(){ 
        return view('homepage');
    }

    public static function logout(){
        if(session()->has('email')){
            session()->flush();
        }
        return redirect('home');
    }
  
}

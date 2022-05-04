<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\Assignment;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentLoginRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class StudentController extends Controller
{
    public function create(){
        return view('studentRegistration');
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
            Student::register($name , $course , $email , $password , $number , $gender);
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }
        return view('login');    
    }

    public function loginView(){
      return view('login');
    }
    
    public function login(StudentLoginRequest $request){
        $request->validate();

        $email    = $request->input('email');
        $password = $request->input('password');

        try{  
            $check = Student::login($email , $password);
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }

        if(count($check)>0){
            try{  
                $student=Student::checkLogin($email);
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
            $request->session()->put('email',$email);
            try{
                $assignment = Assignment::assignmentDetails();
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }
            $data=compact('student','assignment');
        }

        if(isset($data)){
            return view('studentPersonalView')->with($data);
        }
        else{
            return view('wrongCredentials');
        }
    } 

    public function studentView(Request $request){
        $search=$request->input('search',"");

        if(empty($search)){
            try{    
                $student = Student::pagination();        
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }     
        }
        else{
            try{    
               $student = Student::studentView($search);        
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            } 
        }
         
        return view('studentView',compact('student','search'));
    }

    public function destroy($id){
        if(!empty($id)){
            try{
                Student::deleteStudent($id);
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

        return view('studentUpdation')->with($data);
    }

    public function update($id,Request $request){
        if(!empty($id)){
            $name   = $request->input('name');
            $email  = $request->input('email');
            $course = $request->input('course');
            $number = $request->input('number');
            $gender = $request->input('gender');
        
            try{    
                Student::updateStudent($id , $name , $email , $course , $number , $gender);
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
        $limit = 10;
        $offset = ($page-1) * $limit;
        $data = array_slice($filter_data, $offset, $limit);
        $data = new Paginator($data, $count, $limit, $page, ['path'  => $request->url(),'query' => $request->query(),]);
        return view('new',['data' => $data]);
    }

    public static function homePage(){ 
        return view('homePage');
    }

    public static function logout(){
        if(session()->has('email')){
            session()->flush();
        }

        return redirect('home');
    }
  
}

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
    public function index(){
        
        return view('studentregistration');
    }

    public function register(StudentRequest $request){
       
            $request->validate();

            $name=$request->input('name');
            $course=$request->input('course');
            $email=$request->input('email');
            $password=$request->input('password');
            
            $number=$request->input('number');
            $gender=$request->input('gender');
        try{    
    
            Student::register($name,$course,$email,$password,$number,$gender);
        }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
        return view('login');
        
    }

    public function loginview()
    {
      return view('login');
    }
    
    public function login(Request $request)
    {
        $helper=$request;
        $email=$request->input('email');
        $password=$request->input('password');
        try{    
    
            $data=Student::login($email,$password,$request);

        }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
       

        if(isset($data))
        {
            return view('studentpersonal-view')->with($data);
        }

        else{echo "Wrong credentials!";}


     

      
    } 

    

    public function delete($id)
    {
        try{    
    
            Student::deletes($id);
        }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
       
       
        return redirect()->back();
    } 

    public function edit($id)
    {
        try{    
    
            $data=Student::edit($id);
        }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
        
           
        return view('studentupdation')->with($data);
        


        
    }

    public function update($id,Request $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $course=$request->input('course');
        $number=$request->input('number');
        $gender=$request->input('gender');
        
        try{    
    
            Student::updates($id,$name,$email,$course,$number,$gender);
        }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
       
       
        return redirect('/student/view');
    }

    public function new(Request $request)

    {

        $data = Student::new();

        $filter_data = [];

        foreach($data as $row)

        {

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
  
}

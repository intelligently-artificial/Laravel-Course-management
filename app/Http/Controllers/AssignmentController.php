<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Teacher;

class AssignmentController extends Controller
{
    public function index(){
        if(session()->has('email')){
            $me=Teacher::course();
            $data=compact('me'); 

            return view('assignment')->with($data);
        }
        return view('teacherLogin');
    }

    public function assign(Request $request){
        $request->validate(
            [
               'name' => 'required',
               'assignment' => 'required'
            ]);

            $name       = $request->input('name');
            $assignment = $request->input('assignment');
            $course     = $request->input('course');

        try{ 
            Assignment::assign($name , $assignment , $course);
        }catch(\Exception $exception) {
            return view('error')->with('error',$exception->getMessage());
        }
        return redirect()->back();     
    }

  public function view(){
        if(session()->has('email')){
           try{ 
               $assignment = Assignment::assignmentDetails();
               $me=Teacher::assignment(); 
           }catch(\Exception $exception){
               return view('error')->with('error',$exception->getMessage());
           }      
            return view('showAssignment',compact('assignment','me'));
        }
        return view('teacherLogin');
    }

    public function adminView(){
        if(session()->has('email')){
            try{ 
                $assignment = Assignment::pagination(); 
           }catch(\Exception $exception){
               return view('error')->with('error',$exception->getMessage());
           }      
            $data=compact('assignment');
            return view('adminAssignmentView')->with($data);
        }
        return view('adminLogin');
    }
}

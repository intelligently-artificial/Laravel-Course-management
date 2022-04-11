<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Teacher;


class AssignmentController extends Controller
{
    public function index(){
        if(session()->has('email')){
        
           return view('assignment');
        }

        else return view('tlogin');
    }

    public function assign(Request $request){

       
        
        $request->validate(
            [
               'name' => 'required',
               'assignment' => 'required',
               'course' => 'required'
               
            
            ]
            );

        Assignment::assign($request);
        return redirect()->back();
        
       

       
  }

  public function view()
    {
        if(session()->has('email')){
        $assignment = Assignment::all();
        $me=Teacher::where('email',session('email'))->get();       
        $data=compact('assignment','me');
        return view('showassignment')->with($data);
        }

        else return view('tlogin');
    }

    public function adminview()
    {
        if(session()->has('email')){
          $assignment = Assignment::paginate(10);
          $data=compact('assignment');
          return view('adminassignmentview')->with($data);
        }
        else return view('alogin');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Teacher;

class AssignmentController extends Controller
{
    public function index()
    {
        if(session()->has('email'))
        {
           return view('assignment');
        }
        else return view('tlogin');
    }

    public function assign(Request $request)
    {
        $request->validate(
            [
               'name' => 'required',
               'assignment' => 'required',
               'course' => 'required'
            ]
            );
        try
        { 
            Assignment::assign($request);
        }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
        return redirect()->back();     
    }

  public function view()
    {
        if(session()->has('email'))
        {
           try
           { 
               $assignment = Assignment::all();
               $me=Teacher::where('email',session('email'))->get(); 
           }
           catch(\Exception $exception)
           {
               return view('error')->with('error',$exception->getMessage());
           }      
               $data=compact('assignment','me');
               return view('showassignment')->with($data);
        }
        else return view('tlogin');
    }

    public function adminview()
    {
        if(session()->has('email'))
        {
             try
           { 
                $assignment = Assignment::paginate(10); 
           }
           catch(\Exception $exception)
           {
               return view('error')->with('error',$exception->getMessage());
           }      
             $data=compact('assignment');
             return view('adminassignmentview')->with($data);
        }
        else return view('alogin');
    }
}

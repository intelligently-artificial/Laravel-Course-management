<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Teacher;

class AdminController extends Controller
{
    public function loginview()
    {
      return view('alogin');
    }

    public function helloadmin()
    {
      return view('helloadmin');  
    }

    public function login(Request $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');
        $data=Admin::login($email,$password,$request);


        if(isset($data))
        {
          return redirect('helloadmin');
        }

        else{echo "Wrong credentials!";}

    } 

   
    
}

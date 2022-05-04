<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Teacher;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class AdminController extends Controller
{
    public function loginView(){
        return view('adminLogin');
    }

    public function helloAdmin(){
        return view('helloAdmin');  
    }

    public function login(AdminLoginRequest $request){
        $request->validate();
        
        $email    = $request->input('email');
        $password = $request->input('password');
        
        try{    
              $check=Admin::login($email,$password);
        }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }

        if(count($check)>0){
            try{
                $admin=Admin::adminDetails();
            }catch(\Exception $exception){
                return view('error')->with('error',$exception->getMessage());
            }

            $request->session()->put('email',$email);
            $data=compact('admin');
         }

        if(isset($data)){
          return redirect('hello/admin');
        }
        else{
            return view('wrongCredentials');
        }
    }
 
    public function teacherAdminView(Request $request){
        try{    
            $data = Teacher::teacherDetails();
           }catch(\Exception $exception){
            return view('error')->with('error',$exception->getMessage());
        }
        $filter_data = [];
        foreach($data as $value){
            array_push($filter_data, $value);
        }
        $count = count($filter_data);
        $page = $request->page;
        $limit = 2;
        $offset = ($page-1) * $limit;
        $data = array_slice($filter_data, $offset, $limit);
        $data = new Paginator($data, $count, $limit, $page, ['path'  => $request->url(),'query' => $request->query(),]);

        return view('teacherAdminView',['data' => $data]);
    } 
   
}

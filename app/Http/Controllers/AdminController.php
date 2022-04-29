<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Teacher;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

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
        try{    
              $data=Admin::login($email,$password,$request);
           }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
        if(isset($data))
        {
          return redirect('helloadmin');
        }
        else{echo "Wrong credentials!";}

    } 

    public function teacheradminview(Request $request)
    {
        try{    
              $data = Teacher::all();
           }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
        $filter_data = [];
        foreach($data as $value)
        {
            array_push($filter_data, $value);
        }
        $count = count($filter_data);
        $page = $request->page;
        $perPage = 2;
        $offset = ($page-1) * $perPage;
        $data = array_slice($filter_data, $offset, $perPage);
        $data = new Paginator($data, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);
        return view('teacheradminview',['data' => $data]);
    } 
   
}

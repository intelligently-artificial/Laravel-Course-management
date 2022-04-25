<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class ApiController extends Controller
{
    public function view(Request $request)
    {
        
          $search=$request['search']??"";
        try{    

              $data=Student::view($search);        
           }
        catch(\Exception $exception)
        {
            return view('error')->with('error',$exception->getMessage());
        }
         
          return view('student-view')->with($data);
    }

    public function teacheradminview(Request $request)
    {
      
        $data = Teacher::all();
        // $data = Log::index();

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
        // $data=compact('teacher');
        // return view('teacheradminview')->with($data);
      
    //   else return view('alogin');
    } 
}

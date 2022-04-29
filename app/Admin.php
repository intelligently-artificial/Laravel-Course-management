<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="admin";
    protected $primaryKey="admin_id";
    public static function login($email,$password,$request)
    {
        $check=Admin::where(['email'=>$email,'password'=>$password])->get();
        if(count($check)>0)
        {
            $admin=Admin::all();
            $use=$request->input('email');
            $request->session()->put('email',$use);
            $data=compact('admin');
            return $data; 
         }

        else
        {

            return;
        }     
        
    }

}

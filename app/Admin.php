<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="admin";
    protected $primaryKey="admin_id";
    public static function login($email , $password){
        if((!empty($email)) && (!empty($password))){
            $admin = Self::where(['email'=>$email,'password'=>$password])->get();
            return $admin;
        }        
    }

    public static function adminDetails(){
        $admin = Self::all();
        return $admin;
    }
}

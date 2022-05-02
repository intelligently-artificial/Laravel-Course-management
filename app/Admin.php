<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="admin";
    protected $primaryKey="admin_id";
    public static function login($email,$password){
        $admin=Admin::where(['email'=>$email,'password'=>$password])->get();
        return $admin;    
    }
}

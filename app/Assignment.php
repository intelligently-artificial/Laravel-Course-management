<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Assignment extends Model
{
    protected $table="assignment";
    protected $primaryKey="assignment_id";

    public static function assign($request)
    {
        $c=new Assignment;
        $c->name=$request->input('name');
        $c->assignment=$request->input('assignment');
        $c->course=$request->input('course');
        $c->save();

    }
}

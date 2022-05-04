<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Assignment extends Model
{
    protected $table="assignment";
    protected $primaryKey="assignment_id";

    public static function assign($name , $assignment , $course){
        if(!empty($name) && (!empty($assignment)) && (!empty($course))){
            $assign=new Assignment;

            $assign->name          = $name;
            $assign->course        = $course;
            $assign->assignment    = $assignment;

            return $assign->save();
        }
    }

    public static function assignmentDetails(){
        $assignment=Self::all();
        return $assignment;
    }

    public static function pagination(){
        $assignment=Self::paginate(10);
        return $assignment;
    }
}

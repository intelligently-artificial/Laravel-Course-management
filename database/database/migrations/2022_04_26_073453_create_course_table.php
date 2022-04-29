<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('course_id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('student')->onDelete('cascade');
            $table->integer('teacher_id')->unsigned();
            $table->foreign('teacher_id')->references('teacher_id')->on('teacher')->onDelete('cascade');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('assignment')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}

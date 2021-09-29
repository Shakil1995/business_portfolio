<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoursesTable extends Migration
{
    
    public function up()
    {
        Schema::create('courses',function(Blueprint $table){

            $table->bigIncrements('id');
            $table->string('courses_name');
            $table->string('courses_des');
            $table->string('courses_fee');
            $table->string('courses_totalenroll');
            $table->string('courses_totalclass');
            $table->string('courses_link');
            $table->string('courses_img');

        });
    }

   
    public function down()
    {
        //
    }
}

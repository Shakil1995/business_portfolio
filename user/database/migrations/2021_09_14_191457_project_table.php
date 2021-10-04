<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectTable extends Migration
{
   
    public function up()
    {
        Schema::create('projects',function(Blueprint $table){

            $table->bigIncrements('id');
            $table->string('project_name');
            $table->string('project_des');
            $table->string('project_Link');
            $table->string('project_img');

        });
    }

    
    public function down()
    {
        //
    }
}

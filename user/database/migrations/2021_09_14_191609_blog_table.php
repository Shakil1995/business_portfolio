<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogTable extends Migration
{
    
    public function up()
    {
        Schema::create('blogs',function(Blueprint $table){

            $table->bigIncrements('id');
            $table->string('blog_tital');
            $table->string('blog_des');
            $table->string('blog_date');
          });
    }

   
    public function down()
    {
        //
    }
}

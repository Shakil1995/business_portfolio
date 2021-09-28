<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserReviewTable extends Migration
{
   
    public function up()
    {
        Schema::create('user_review',function(Blueprint $table){

            $table->bigIncrements('id');
            $table->string('user_name');
            $table->string('user_review_meg');
            $table->string('user_meg');

        });
    }

    
    public function down()
    {
        //
    }
}

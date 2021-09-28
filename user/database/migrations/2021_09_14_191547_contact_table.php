<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactTable extends Migration
{
    
    public function up()
    {
        Schema::create('contact',function(Blueprint $table){

            $table->bigIncrements('id');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('contact_meg');

        });
    }

   
    public function down()
    {
        //
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_ReviewModel extends Model
{
    public $table='user_review';
    public $primaryKey ='id';
    public $incrementing=true;
    public $timestamps=false;
}

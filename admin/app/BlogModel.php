<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    public $table='blogs';
    public $primaryKey ='id';
    public $incrementing=true;
    public $timestamps=false;
}

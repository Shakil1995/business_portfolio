<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    public $table='contact';
    public $primaryKey ='id';
    public $incrementing=true;
    public $timestamps=false;
}

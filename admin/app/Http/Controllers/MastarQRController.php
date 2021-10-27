<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MastarQRController extends Controller
{
    function MasterQRIndex(){

        return view('mastarqr');
    }
}

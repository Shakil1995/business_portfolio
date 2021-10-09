<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogModel;

class BlogController extends Controller
{
    function BlogIndex(){

        return view('Blog');
    }

}

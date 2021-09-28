<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;

class ProjectController extends Controller
{
    function ProjectIndex(){

        return view('Project');
    }
}

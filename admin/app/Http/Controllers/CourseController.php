<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoursesModel;

class CourseController extends Controller
{
    function CourseIndex(){

        return view('Course');
    }

    function  getCourseData(){
        $result =json_decode(CoursesModel::all());
        return $result;
    }





}

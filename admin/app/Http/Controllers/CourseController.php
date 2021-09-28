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

    function  courseDelete(Request $req){
        $id= $req->input('id');
        $result= CoursesModel::where('id','=',$id)->delete();

        if($result==true){
            return  1;
        }else{
            return  0;
        }

    }



}

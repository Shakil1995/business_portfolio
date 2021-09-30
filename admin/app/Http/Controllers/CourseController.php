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


    function  getCourseDetails (Request $req){
        $id= $req->input('id');
        $result =json_decode(CoursesModel::where('id','=',$id)->get());
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

    function  courseUpdate(Request $req){
        $id= $req->input('id');
        $courses_name= $req->input('courses_name');
        $courses_des= $req->input('courses_des');
        $course_fee= $req->input('course_fee');
        $course_totalenroll= $req->input('course_totalenroll');
        $course_totalclass= $req->input('course_totalclass');
        $course_link= $req->input('	course_link');
        $courses_img= $req->input('	courses_img');

        $result= CoursesModel::where('id','=',$id)->update([
            'courses_name'=>$courses_name,
            'courses_des'=>$courses_des,
            '$course_fee'=>$course_fee,
            'course_totalenroll'=>$course_totalenroll,
            'course_totalclass'=>$course_totalclass,
            'course_link'=>$course_link,
            'courses_img'=>$courses_img,

        ]);
        if($result==true){
            return  1;
        }else{
            return  0;
        }
    }


    function  courseAdd(Request $req){
//        $id= $req->input('id');
        $courses_name= $req->input('courses_name');
        $courses_des= $req->input('courses_des');
        $course_fee= $req->input('course_fee');
        $course_totalenroll= $req->input('course_totalenroll');
        $course_totalclass= $req->input('course_totalclass');
        $course_link= $req->input('	course_link');
        $courses_img= $req->input('	courses_img');

        $result= CoursesModel::insert([
            'courses_name'=>$courses_name,
            'courses_des'=>$courses_des,
            '$course_fee'=>$course_fee,
            'course_totalenroll'=>$course_totalenroll,
            'course_totalclass'=>$course_totalclass,
            'course_link'=>$course_link,
            'courses_img'=>$courses_img,
        ]);
        if($result==true){
            return  1;
        }else{
            return  0;
        }
    }



}

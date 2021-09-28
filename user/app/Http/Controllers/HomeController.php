<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\ServicesModel;
use App\CoursesModel;
use App\ProjectModel;
use App\ContactModel;
use App\BlogModel;
use App\user_ReviewModel;
use App\footerModel;


class HomeController extends Controller
{
    function HomeIndex(){

       $userIP= $_SERVER['REMOTE_ADDR'];
       date_default_timezone_set("Asia/Dhaka");
       $timeDate=date("y-m-d h:i:sa");
       VisitorModel::insert([ 'ip_address'=>$userIP,'visit_time'=> $timeDate]);


          
      $servicesData= json_decode(ServicesModel::all());

      $coursesData= json_decode(CoursesModel::all());
      $projectsData= json_decode(ProjectModel::all());
      $blogsData= json_decode(BlogModel::all());
      $userReviewData= json_decode(user_ReviewModel::all());

        return view( 'Home', [
            "servicesData"=>$servicesData,
            "coursesData"=>$coursesData,
            "projectsData"=>$projectsData,
            "blogsData"=>$blogsData,
            "userReviewData"=>$userReviewData,
            ]);
    }
}

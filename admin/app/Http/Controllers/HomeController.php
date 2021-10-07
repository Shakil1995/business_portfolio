<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;
use App\CoursesModel;
use App\BlogModel;
use App\ServicesModel;
use App\ProjectModel;
use App\VisitorModel;
use App\user_ReviewModel;

class HomeController extends Controller
{
 function HomeIndex(){

  
   $totalCourse= CoursesModel::count();
   $totalBlog=  BlogModel::count();
   $totalServices=  ServicesModel::count();
   $totalProject=   ProjectModel::count();
   $totalVisitor=   VisitorModel::count();
   $totalReview=   user_ReviewModel::count();
   $totalContact=   ContactModel::count();



     return view('Home',[
       'totalCourse'=>$totalCourse,
      'totalBlog' =>$totalBlog,
     'totalServices'=>$totalServices,
    'totalProject' =>  $totalProject,
      'totalVisitor'=> $totalVisitor,
     'totalReview'=>   $totalReview,
     'totalContact'=>  $totalContact,
     ]);
 }
}

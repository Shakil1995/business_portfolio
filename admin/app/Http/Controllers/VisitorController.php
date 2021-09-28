<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

class VisitorController extends Controller
{

    function VisitorIndex(){

     $visitorData= json_decode(VisitorModel::orderby('id','desc')->take(500)->get() )  ;


     return view('Visitor',['visitorData'=>$visitorData]);
    }

//    function getVisitorData(){
//
//        $visitorData=json_decode(VisitorModel::orderBy('id','desc')->take(500)->get());
//
////        $visitorData =json_decode(VisitorModel::all());
//        return $visitorData ;
//    }
}



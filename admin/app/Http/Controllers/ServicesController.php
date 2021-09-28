<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ServicesModel;
class ServicesController extends Controller
{

    function ServicesIndex(){

        return view('Services');
    }
    function  getServicesData(){
       $result =json_decode(ServicesModel::all());
        return $result;
    }
    function  getServicesDetails (){
        $result =json_decode(ServicesModel::all());
        return $result;
    }

    function  serviceDelete(Request $req){
       $id= $req->input('id');
       $result= ServicesModel::where('id','=',$id)->delete();

       if($result==true){
           return  1;
       }else{
           return  0;
       }

    }
}

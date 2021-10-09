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
       $result =json_decode(ServicesModel::orderBy('id','desc')->get());
        return $result;
    }
    
    function  getServicesDetails (Request $req){
        $id= $req->input('id');
        $result =json_decode(ServicesModel::where('id','=',$id)->get());
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

    function  serviceUpdate(Request $req){
        $id= $req->input('id');
        $name= $req->input('name');
        $des= $req->input('des');
        $img= $req->input('img');

        $result= ServicesModel::where('id','=',$id)->update(['service_name'=>$name,'service_des'=>$des,'service_img'=>$img]);
        if($result==true){
            return  1;
        }else{
            return  0;
        }

    }


    function  serviceAdd(Request $req){
        $name= $req->input('name');
        $des= $req->input('des');
        $img= $req->input('img');

        $result= ServicesModel::insert(['service_name'=>$name,'service_des'=>$des,'service_img'=>$img]);
        if($result==true){
            return  1;
        }else{
            return  0;
        }

    }




}

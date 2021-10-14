<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhotoModel;

class PhotoController extends Controller
{
    function PhotoIndex(){

        return view('photo');
    }

    function PhotoJSON(Request $request){

        return PhotoModel::take(3)->get();
    }

//
//    function PhotoJSONId( Request $request){
//        $FirstID=$request->id;
//     $lastID= $FirstID+3;
//      return PhotoModel::where('id','>',$FirstID)->where('id','<=',$lastID)->get();
//    }


    function PhotoJSONId(Request $request){
        $FirstID=$request->id;
        $LastID=$FirstID+3;
        return PhotoModel::where('id','>=',$FirstID)->where('id','<',$LastID)->get();
    }



    function PhotoSave(Request $request ){
    $photoPath=$request->file('photo')->store('public');

        $photoName=(explode('/',$photoPath))[1];
       $host= $_SERVER['HTTP_HOST'];
//        $location="https://". $host."/storage/".$photoName;
        $location="http://".$host."/storage/".$photoName;

        PhotoModel::insert(['photo_location'=> $location ]);


//    return $photoPath;

        if($photoPath==true){
            return  1;
        }else{
            return  0;
        }

    }


}

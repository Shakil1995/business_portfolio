<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;

class ContactController extends Controller
{
    function ContactIndex(){

        return view('Contact');
    }


    function  getContactData(){
        $result =json_decode(ContactModel::orderBy('id','desc')->get());
         return $result;
     }



     function contactDelate(Request $req){
        $id= $req->input('id');
        $result= ContactModel::where('id','=',$id)->delete();
        if($result==true){
            return  1;
        }else{
            return  0;
        }
 
     }


     function  getContactDetails (Request $req){
        $id= $req->input('id');
        $result =json_decode(ContactModel::where('id','=',$id)->get());
        return $result;
    }

 
}

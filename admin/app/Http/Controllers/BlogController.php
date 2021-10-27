<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogModel;

class BlogController extends Controller
{
    function BlogIndex(){

        return view('Blog');
    }


    function  getBlogData(){
        $result =json_decode(BlogModel::orderBy('id','desc')->get());
         return $result;
     }
     function  blogDelete(Request $req){
        $id= $req->input('id');
        $result= BlogModel::where('id','=',$id)->delete();
 
        if($result==true){
            return  1;
        }else{
            return  0;
        }
 
     }


     function addBlog(Request $request ){
        $photoPath=$request->file('photo')->store('public');
    
            $photoName=(explode('/',$photoPath))[1];
           $host= $_SERVER['HTTP_HOST'];
    //        $location="https://". $host."/storage/".$photoName;
            $location="http://".$host."/storage/".$photoName;
    
            $blog_tital= $request->input('blog_tital');
            $blog_des= $request->input('blog_des');
            $blog_date= $request->input('blog_date');


            BlogModel::insert([
                'blog_tital'=> $blog_tital ,
                'blog_des'=> $blog_des ,
                'blog_date'=> $blog_date ,
                'blog_img'=> $location ,

        ]);
    
    
    //    return $photoPath;
    
            if($photoPath==true){
                return  1;
            }else{
                return  0;
            }
    
        }

}

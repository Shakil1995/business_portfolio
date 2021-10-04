<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;

class ProjectController extends Controller
{
    function ProjectIndex(){

        return view('Project');
    }

    function getProjectData(){
        $result =json_decode(ProjectModel::all());
        return $result;
    }


    function  getProjectDetails (Request $req){
        $id= $req->input('id');
        $result =json_decode(ProjectModel::where('id','=',$id)->get());
        return $result;
    }




    function  projectUpdate(Request $req){
        $id= $req->input('id');
        $project_name= $req->input('project_name');
        $project_des= $req->input('project_des');
        $project_Link= $req->input('project_Link');
        $project_img= $req->input('project_img');


        $result= ProjectModel::where(
            'id','=',$id
            
            )->update([
                'project_name'=>$project_name,
            'project_des'=>$project_des,
            'project_Link'=>$project_Link,
            'project_img'=>$project_img,
            
            
            ]);
        if($result==true){
            return  1;
        }else{
            return  0;
        }

    }






    function  projectDelete(Request $req){
        $id= $req->input('id');
        $result= ProjectModel::where('id','=',$id)->delete();
 
        if($result==true){
            return  1;
        }else{
            return  0;
        }
 
     }

     function  projectAdd(Request $req){
        $project_name= $req->input('project_name');
        $project_des= $req->input('project_des');
        $project_Link= $req->input('project_Link');
        $project_img= $req->input('project_img');

        $result= ProjectModel::insert([
            'project_name'=>$project_name,
            'project_des'=>$project_des,
            'project_Link'=>$project_Link,
            'project_img'=>$project_img,
        ]);
        if($result==true){
            return  1;
        }else{
            return  0;
        }

    }



}

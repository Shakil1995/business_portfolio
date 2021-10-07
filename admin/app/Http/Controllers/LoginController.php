<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel;

class LoginController extends Controller
{
   public function LoginIndex(){
       return view('Login');
   }

   public function onLogOut(Request $request){

$request->session()->flush();
    return redirect('/Login');
}


public function OnLogin(Request $request ){

    $user=$request->input('user');
    $pass=$request->input('pass');
   $countValue= AdminModel::where('admin_name','=',$user)->where('admin_password','=',$pass)->count();
if($countValue==1){
    $request->session()->put('user',$user);

    return 1;
}else{
    return 0;
}

   

}





}

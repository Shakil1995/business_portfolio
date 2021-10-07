<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailSendController extends Controller
{
    public function create()
    {
        return view('email.create');
    }

  public function sendMail(Request $request){

   Mail::send('email.sendmail',[
'data'=>$request->message
   ],function($message)use($request){
     $message->to($request->email);
     $message->subject($request->subject);
   });
   return back()->with('success','mail send done');

  }


}

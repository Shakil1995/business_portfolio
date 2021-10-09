<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_ReviewModel;

class UserReviewController extends Controller
{
    function ReviewIndex(){

        return view('UserReview');
    }

}

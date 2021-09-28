<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@HomeIndex');

Route::get('/visitor','VisitorController@VisitorIndex');
//Route::get('/getVisitorsData','VisitorController@getVisitorData');

Route::get('/service','ServicesController@ServicesIndex');
Route::get('/getServicesData','ServicesController@getServicesData');

Route::post('/ServicesDelete','ServicesController@serviceDelete');



Route::get('/course','CourseController@CourseIndex');
Route::get('/getCourseData','CourseController@getCourseData');

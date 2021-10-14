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



Route::get('/','HomeController@HomeIndex')->middleware('loginCheck');

Route::get('/visitor','VisitorController@VisitorIndex')->middleware('loginCheck');
//Route::get('/getVisitorsData','VisitorController@getVisitorData');

Route::get('/service','ServicesController@ServicesIndex')->middleware('loginCheck');
Route::get('/getServicesData','ServicesController@getServicesData')->middleware('loginCheck');
Route::post('/ServicesDelete','ServicesController@serviceDelete')->middleware('loginCheck');
Route::post('/ServicesDetail','ServicesController@getServicesDetails')->middleware('loginCheck');
Route::post('/ServicesUpdate','ServicesController@serviceUpdate')->middleware('loginCheck');
Route::post('/ServicesAdd','ServicesController@serviceAdd')->middleware('loginCheck');





//Course Route
Route::get('/course','CourseController@CourseIndex')->middleware('loginCheck');
Route::get('/getCourseData','CourseController@getCourseData')->middleware('loginCheck');
Route::post('/CourserDetails','CourseController@getCoursesDetails')->middleware('loginCheck');
Route::post('/CourseDelete','CourseController@courseDelete')->middleware('loginCheck');
Route::post('/CourserUpdate','CourseController@courseUpdate')->middleware('loginCheck');
Route::post('/CourseAdd','CourseController@courseAdd')->middleware('loginCheck');




//Project Route
Route::get('/project','ProjectController@ProjectIndex')->middleware('loginCheck');
Route::get('/getProjectData','ProjectController@getProjectData')->middleware('loginCheck');

Route::post('/ProjectDetail','ProjectController@getProjectDetails')->middleware('loginCheck');


Route::post('/ProjectDelete','ProjectController@projectDelete')->middleware('loginCheck');
Route::post('/ProjectUpdate','ProjectController@projectUpdate')->middleware('loginCheck');
Route::post('/ProjectAdd','ProjectController@projectAdd')->middleware('loginCheck');





Route::get('/Login','LoginController@LoginIndex');
Route::post('/onLogin','LoginController@OnLogin');
Route::get('/Logout','LoginController@onLogOut');






//Contact Route
Route::get('/contact','ContactController@ContactIndex')->middleware('loginCheck');
Route::get('/getContactData','ContactController@getContactData')->middleware('loginCheck');
Route::get('/ContactDelate','ContactController@contactDelate')->middleware('loginCheck');

Route::get('/ContactDetails','ContactController@getContactDetails')->middleware('loginCheck');


//Blog Route
Route::get('/blog','BlogController@BlogIndex')->middleware('loginCheck');


//Blog Route
Route::get('/review','UserReviewController@ReviewIndex')->middleware('loginCheck');





Route::get('/photo','PhotoController@PhotoIndex')->middleware('loginCheck');
Route::post('/photoSave','PhotoController@PhotoSave')->middleware('loginCheck');
Route::get('/photoJSON','PhotoController@PhotoJSON')->middleware('loginCheck');
Route::get('/photoJSONByID/{id}','PhotoController@PhotoJSONId')->middleware('loginCheck');


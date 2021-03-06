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

Route::get('/', 'HomeController@HomeIndex');

Route::post('/contactSend', 'HomeController@ContactSend');

Route::get('/sendEmail', [App\Http\Controllers\EmailSendController::class, 'create']);
Route::post('/sendEmail',  [App\Http\Controllers\EmailSendController::class, 'sendMail']);


// Route::get('/sendEmail', [App\Http\Controllers\EmailSendController::class, 'create']);
// Route::post('/sendEmail',  [App\Http\Controllers\EmailSendController::class, 'sendMail']);



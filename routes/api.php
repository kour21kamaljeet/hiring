<?php

use App\Models\User;
use App\Http\Controllers\UserLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gCalendarController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login',function(){
    return true;
});

//Route::resource('cal', 'App\Http\Controllers\gCalendarController');
//Route::get('oauth', 'App\Http\Controllers\gCalendarController@oauth')->name('oauthCallback');
//Route::get('/showquestion',[UserLoginController::class,'showQuestion']);
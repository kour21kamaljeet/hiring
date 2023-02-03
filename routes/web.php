<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleCalendarController;
use App\Http\Controllers\gCalendarController;


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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
//for login
// Route::view('login','auth.login');
Route::get('/home',[HomeController::class,'index'])->name('home');

Route::get('login','App\Http\Controllers\Auth\LoginController@showLogin');

Route::post('/testuser', 'App\Http\Controllers\Auth\LoginController@authenticate');

Route::get('userregister',[UserRegisterController::class,'getValues']);

Route::post('userregister',[UserRegisterController::class,'saveUser']);

Route::view('showuser', 'showuser');

Route::view('test', 'test');

Route::get('showcandidate/{roleid}', [
    'as' => 'showcandidate','uses' => 'App\Http\Controllers\UserRegisterController@showCandidate',
]);

Route::get('users/{id}/delete', [
    'as' => 'users.delete','uses' => 'App\Http\Controllers\UserRegisterController@deleteUser',
]);
Route::get('users/{id}/edit', [
    'as' => 'users.edit','uses' => 'App\Http\Controllers\UserRegisterController@editUser',
]);
Route::post('users/{id}/update', [
    'as' => 'users.update','uses' => 'App\Http\Controllers\UserRegisterController@updateUser',
]);

Route::get('questions', [
    'as' => 'questions.show','uses' => 'App\Http\Controllers\AdminController@showQuestions',
]);

Route::get('questions.create', [
    'as' => 'questions.create','uses' => 'App\Http\Controllers\AdminController@createQuestions',
]);

Route::post('create-question', [
    'as' => 'create-question','uses' => 'App\Http\Controllers\AdminController@storeQuestion',
]);

Route::get('question/{id}/delete', [
    'as' => 'question.delete','uses' => 'App\Http\Controllers\AdminController@deleteQuestion',
]);

Route::get('question/{id}/edit', [
    'as' => 'question.edit','uses' => 'App\Http\Controllers\AdminController@editQuestion',
]);

Route::post('question/{id}/update', [
    'as' => 'question.update','uses' => 'App\Http\Controllers\AdminController@updateQuestion',
]);

Route::get('question-setting', [
    'as' => 'question-setting','uses' => 'App\Http\Controllers\UserLoginController@questionSetting',
]);

Route::post('questionsetting', [
    'as' => 'questionsetting.update','uses' => 'App\Http\Controllers\UserLoginController@updateQuestionSetting',
]);

Route::get('candidate/{id}/edit', [
    'as' => 'candidate.edit','uses' => 'App\Http\Controllers\UserLoginController@editUser',
]);

Route::post('candidate/{id}/update', [
    'as' => 'candidate.update','uses' => 'App\Http\Controllers\UserLoginController@updateUser',
]);

Route::get('showquestion', [
    'as' => 'showquestion','uses' => 'App\Http\Controllers\UserLoginController@showQuestion',
]);

Route::post('submitquestion', [
    'as' => 'submitquestion','uses' => 'App\Http\Controllers\UserLoginController@submitQuestion',
]);

Route::get('photo.show', [
    'as' => 'photo.show','uses' => 'App\Http\Controllers\HomeController@showPhoto',
]);

Route::post('photo.update', [
    'as' => 'photo.update','uses' => 'App\Http\Controllers\HomeController@updatePhoto',
]);

Route::get('showcandidatecategory/{status}/{roleid}', [
    'as' => 'showcandidatecategory','uses' => 'App\Http\Controllers\UserRegisterController@showCandidateCategory',
]);

Route::get('select-categories', [
    'as' => 'select-categories','uses' => 'App\Http\Controllers\HomeController@selectCategories',
]);

//For login through gmail
Route::get('google', function () {
    return view('googleAuth');
});

Route::get('auth/google', 'App\Http\Controllers\Auth\LoginController@redirectToGoogle');

Route::get('/auth/google/callback', 'App\Http\Controllers\Auth\LoginController@handleGoogleCallback');

//For google calendar
/*Route::get('/google-calendar/connect', 'GoogleCalendarController@connect');
Route::post('/google-calendar/connect', 'GoogleCalendarController@store');
Route::get('get-resource', 'GoogleCalendarController@getResources');*/

//Route::resource('cal', 'App\Http\Controllers\gCalendarController');
Route::get('cal/index/{email}', [
    'as' => 'cal.index', 'uses' => 'App\Http\Controllers\gCalendarController@index',
]);
Route::get('cal/create/{email}', [
    'as' => 'cal.create', 'uses' => 'App\Http\Controllers\gCalendarController@create',
]);
Route::post('cal/store/{email}', [
    'as' => 'cal.store', 'uses' => 'App\Http\Controllers\gCalendarController@store',
]);
Route::get('oauth/{email}', [
    'as' => 'oauthCallback', 'uses' => 'App\Http\Controllers\gCalendarController@oauth',
]);
Route::get('cal/book/{email}', [
    'as' => 'cal.book', 'uses' => 'App\Http\Controllers\gCalendarController@book',
]);





<?php

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

Route::group( ['middleware' => ['checkusr']], 
function()
{


        Route::get('/home','HomeController@homepage');

        Route::get('/addproject','ProjectController@addpage');

        Route::get('/editprofile','ProfileController@editpage');

        Route::get('/post/{id}','PostController@PostPage');

        Route::get('/gpacalc','ToolController@ViewGPACalc');
        Route::get('/timetable','HomeController@TimeTable');
        Route::get('/calender','ToolController@ViewCalender');

} 
    );



Route::get('/projects/{id?}','ProjectController@showprojects');
Route::get('/project/{id}','ProjectController@projectdetails');
Route::get('/profile/{id}','ProfileController@ViewProfile');

Route::get('/','logController@logpage')->middleware('checklog');
Route::post('/','logController@login');
Route::get('/logout','logController@logout');


Route::post('/home','PostController@SharePost')->middleware('PostValid');
Route::post('/comment/{id}','PostController@comment')->middleware('CommentValid');

Route::post('/editprofile','ProfileController@editprofile');
Route::post('/changepic','ProfileController@changepic');

Route::post('/gpacalc','ToolController@CalculateGPA')->middleware('GpaValid');
Route::post('/addproject','ProjectController@addproject');
Route::post('/searchuser','HomeController@SearchUser');
Route::get('/index',function(){return view('index');});
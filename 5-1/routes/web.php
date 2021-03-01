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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'timeline','middleware' => 'auth'], function(){
    //timelineにアクセスされたらTimelineControllerのshowTimelinePage関数で処理する
    Route::get('/','Admin\TimelineController@showTimelinePage');
    //timelineにpostリクエスト（データ送らせて）されたらTimelineControllerのpostTweet関数で処理する
    Route::post('/','Admin\TimelineController@postTweet');
    //timeline/deleteにアクセスされたらTimelineControllerのdelete関数で処理する
    Route::get('/delete/{id}','Admin\TimelineController@delete');
});

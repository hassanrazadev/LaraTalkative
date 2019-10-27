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

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function(){
    Route::get('/' , 'HomeController@index')->name('home');
    Route::get('/do-logout' , 'UserController@doLogout')->name('doLogout');

    Route::get('/load-latest-messages' , 'MessageController@loadLatestMessages')->name('loadLatestMessages');
    Route::post('/send-message' , 'MessageController@sendMessage')->name('sendMessage');
});

Route::get('/user-login' , 'UserController@userLogin')->name('userLogin');
Route::get('/user-register' , 'UserController@userRegister')->name('userRegister');

Route::post('/do-login' , 'UserController@doLogin')->name('doLogin');
Route::post('/do-register' , 'UserController@doRegister')->name('doRegister');

Route::get('test', function (){
    event(new \App\Events\TestEvent("Hello! I am here"));
});

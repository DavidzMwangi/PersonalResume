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
//backend
Route::group(['namespace'=>'Backend','prefix'=>'admin','as'=>'admin.','middleware'=>'auth'],function (){
        Route::get('home','HomeController@index')->name('home');
        Route::get('about_me','AboutMeController@index')->name('about_me');
        Route::get('about_me_basics','AboutMeController@aboutMeBasics')->name('about_me_basics');
        Route::post('save_about_me','AboutMeController@saveRecord')->name('save_about_me');

});

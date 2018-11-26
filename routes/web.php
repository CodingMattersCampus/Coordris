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

Auth::routes();
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::group(['middleware' => "auth"], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/centers/listing', "Center\Listing")->name('center.listing');
    Route::post('/centers/registration', "Center\Registration")->name('centers.registration');
    Route::get('/centers/{center}/detail', "Center\Detail")->name('center.detail');
});
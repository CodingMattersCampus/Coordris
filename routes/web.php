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
    Route::get('/maps', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'centers', "namespace" => "Center"], function () {
        Route::get('listing', "Listing")->name('center.listing');
        Route::post('registration', "Registration")->name('centers.registration');
        Route::get('{center}/detail', "Detail")->name('center.detail');
    });

    Route::group(['prefix' => 'products', 'namespace' => "Product"], function () {
        Route::get('listing', "Listing")->name('products.listing');
        Route::post('registration', "Registration")->name('products.registration');
        Route::view('categories', 'product.category.listing')->name('product.categories.listing');
        Route::view('brands', 'product.brand.listing')->name('product.brands.listing');
    });
});
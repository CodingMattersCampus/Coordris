<?php

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

Route::group(['namespace' => "Search", 'prefix' => 'search'], function () {
    Route::group(['prefix' => 'products', "namespace" => "Product"], function () {
        Route::get("/", "AllProducts")->name('api.search.products.all');
    });
});

Route::group(['namespace' => "Center", 'prefix' => 'centers'], function () {

    Route::group(['namespace' => "Household", 'prefix' => 'household'], function() {
        Route::get('{center}/household/listing', "Listing")->name('api.center.household.listing');
    });
});
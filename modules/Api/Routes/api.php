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


Route::group(['prefix' => "lgu/{lgu}", 'namespace' => "Lgu"], function() {
    Route::group(['prefix' => 'centers', 'namespace' => "Center"], function() {
        Route::get('listing', "Listing")->name('api.lgu.centers.listing');
    });

    Route::group(['prefix' => 'evacuation', "namespace" => "Evacuation"], function() {
        Route::get('centers', "Centers")->name('api.lgu.evacuation.centers');
    });
});

Route::get('lgu/evacuation/centers', "Center\EvacuationCenter")->name('api.evacuation.centers');

Route::get('lgu/center/{center}/status', "Evacuation\CenterStatusController")->name('api.center.status');


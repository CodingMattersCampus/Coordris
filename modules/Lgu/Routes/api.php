<?php

/**
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('{lgu}/centers/listing', "Lgu\Center\Listing@getAllAsResourceCollection")->name('api.lgu.centers.listing');
Route::get('/centers/listing', "Center\Listing@getAllAsResourceCollection")->name('api.centers.listing');

Route::get('disasters/listing', "Disaster\Listing@getAllAsResourceCollection")->name('api.disasters.listing');

Route::group(['prefix' => 'products', 'namespace' => "Product"], function () {
    Route::get('listing', "Listing@getAllAsResourceCollection")->name('api.products.listing');
    Route::get('brands/listing', "Brand\Listing@getAllAsResourceCollection")->name('api.products.brands.listing');
    Route::get('categories/listing', "Category\Listing@getAllAsResourceCollection")->name('api.products.categories.listing');
});
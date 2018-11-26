<?php

use Illuminate\Http\Request;

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

Route::get('/centers/listing', "Center\Listing@getAllAsResourceCollection")->name('api.centers.listing');
Route::get('products/listing', "Product\Listing@getAllAsResourceCollection")->name('api.products.listing');

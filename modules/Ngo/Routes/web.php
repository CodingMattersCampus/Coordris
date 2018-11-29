<?php

/**
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], function() {
    Route::view('login', "lgu::user.login")->name('ngo.login');
    Route::post('login', "User\Authentication\Login")->name('ngo.login.attempt');
});

Route::group(['middleware' => 'auth:ngo'], function() {

    Route::post('logout', "User\Authentication\Logout")->name('ngo.logout');

    Route::view('/', 'ngo::center.map')->name('ngo.centers.map');

    Route::get('/product/listing', 'Warehouse\InventoryController')->name('ngo.product.listing');
});
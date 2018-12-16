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

    Route::get('/', function () {
        return redirect()->route('ngo.centers.map');
    })->name('ngo.home');

    Route::group(['prefix' => 'centers', 'namespace' => "Center"], function () {
        Route::view('map', 'ngo::center.map')->name('ngo.centers.map');
        Route::get('{center}/detail', "Detail")->name('ngo.center.detail');
    });

    Route::get('/product/listing', 'Warehouse\InventoryController')->name('ngo.product.listing');
    Route::post('warehouse/{ngo}/items/dispatch', 'Warehouse\Item\Dispatch')->name('ngo.warehouse.items.dispatch');


    Route::get('inventory/report/dispatch', "Warehouse\Report\DispatchReport")->name('ngo.warehouse.report.dispatch');
});
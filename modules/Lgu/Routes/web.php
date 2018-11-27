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
    Route::view('login', "lgu::user.login")->name('lgu.login');
    Route::post('login', "User\Authentication\Login")->name('lgu.login.attempt');
});


Route::group(['middleware' => 'auth:lgu'], function() {

    Route::post('logout', "User\Authentication\Logout")->name('lgu.logout');

    Route::get('/', function () {
        return redirect(\route('lgu.home'));
    });

    Route::view('/maps', "lgu::home")->name('lgu.home');

    Route::group(['prefix' => 'centers', "namespace" => "Center"], function () {
        Route::get('listing', "Listing")->name('center.listing');
        Route::post('registration', "Registration")->name('centers.registration');
        Route::get('{center}/detail', "Detail")->name('center.detail');
    });

    Route::group(['prefix' => 'products', 'namespace' => "Product"], function () {
        Route::get('listing', "Listing")->name('products.listing');
        Route::post('registration', "Registration")->name('products.registration');

        Route::post('categories', "Category\Registration")->name('product.category.registration');
        Route::view('categories', 'product.category.listing')->name('product.categories.listing');

        Route::post('brands', "Brand\Registration")->name('product.brand.registration');
        Route::view('brands', 'product.brand.listing')->name('product.brands.listing');
    });

    Route::group(['prefix' => 'disasters', 'namespace' => "Disaster"], function(){
        Route::get('listing', "Listing")->name('disasters.listing');
    });
});

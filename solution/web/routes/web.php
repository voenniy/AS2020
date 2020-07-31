<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>'auth'], function () {
    Route::get('/', 'ProfileController@show')->name('user.home');
    Route::get('/profile', 'ProfileController@showform')->name('user.update');
    Route::post('/profile/update', 'ProfileController@update')->name('user.save');

    Route::group(['as' => 'orders.'], function () {
        Route::get('/orders', 'OrdersController@index')->name('index');
        Route::post('/orders', 'OrdersController@create')->name('create');
        Route::get('/orders/{order_id}', 'OrdersController@update')->name('update');
    });
    Route::get('/logout', 'Auth\LoginController@logout');
});

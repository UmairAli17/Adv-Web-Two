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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


/**
 * Roles for Shopkeepers Only
 */
Route::group(['middleware' => 'role:shopkeeper'], function() {
	
	Route::get('/shopkeeper', 'ShopController@dashboard')->name('shop.dash');
});




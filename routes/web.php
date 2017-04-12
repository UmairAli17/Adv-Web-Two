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
	//Shop Dashboard
	Route::get('/shopkeeper', 'ShopController@dashboard')->name('shop.dash');
	//Shop Profile
	Route::get('/shop/{shop}/profile', 'ShopController@profile')->name('shop.profile');
	//Edit Shop Profile
	Route::get('/shopkeeper/{shop}/edit', 'ShopController@edit_shop')->name('shop.edit');
	//UPDATE Shop Profile
	Route::PATCH('/shopkeeper/{shop}/update', 'ShopController@update_shop')->name('shop.update');


	//Manage Products
	Route::get('/shop/manage-products', 'ProductsController@dashboard')->name('products.manage');

	//Show Add Products From
	Route::get('/shop/add', 'ProductsController@add')->name('products.add');

	Route::post('/shop/insert', 'ProductsController@create')->name('products.create');
});




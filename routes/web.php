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

Route::get('/home', 'ShopController@all')->name('home');


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

	//Show Add Product From
	Route::get('/product/add', 'ProductsController@add')->name('products.add');

	//Insert Product to Database
	Route::post('/product/insert', 'ProductsController@create')->name('products.create');
	
	//Show Edit Product From
	Route::get('/product/{product}/edit/', 'ProductsController@edit')->name('products.edit');

	//UPDATE Product
	Route::PATCH('/product/{product}/update', 'ProductsController@update')->name('products.update');

	//DELETE Product
	Route::PATCH('/product/{product}/delete', 'ProductsController@delete')->name('products.delete');
});




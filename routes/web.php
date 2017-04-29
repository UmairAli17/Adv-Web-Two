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
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => 'role:shopkeeper|user'], function() {
    
    //Logged in Homepage
    Route::get('/home', 'ShopController@all')->name('home');
    
	//Shop Profile
	Route::get('/shop/{shop}/profile', 'ShopController@profile')->name('shop.profile');

	//Add Order
	Route::get('/order/add/{id}', 'OrderController@addOrder')->name('orders.add');

	//View own Orders
	Route::get('/orders/my-orders', 'OrderController@viewMyOrders')->name('orders.mine');

	//View own Orders
	Route::get('/orders/{id}/delete', 'OrderController@delete')->name('orders.delete');

	//Get All Products
	Route::get('/products/all', 'ProductsController@all')->name('products.all');

	//View Product
	Route::get('/product/{product}', 'ProductsController@view')->name('products.view');

	Route::get('/test', 'HomeController@test');
});

/**
 * Roles for Shopkeepers Only
 */
Route::group(['middleware' => 'role:shopkeeper'], function() {
	//Shop Dashboard
	Route::get('/shop', 'ShopController@dashboard')->name('shop.dash');
	
	//Edit Shop Profile
	Route::get('/shop/{shop}/edit', 'ShopController@editShop')->name('shop.edit');
	//UPDATE Shop Profile
	Route::PATCH('/shop/{shop}/update', 'ShopController@updateShop')->name('shop.update');

	//Manage Products
	Route::get('/shop/manage-products', 'ProductsController@dashboard')->name('products.manage');

	//Show Add Product From
	Route::get('/create-product', 'ProductsController@add')->name('products.add');

	//Insert Product to Database
	Route::post('/product/insert', 'ProductsController@create')->name('products.create');
	
	//Show Edit Product From
	Route::get('/product/{product}/edit/', 'ProductsController@edit')->name('products.edit');

	//UPDATE Product
	Route::PATCH('/product/{product}/update', 'ProductsController@update')->name('products.update');

	//DELETE Product
	Route::PATCH('/product/{product}/delete', 'ProductsController@delete')->name('products.delete');

	// Show Business Orders
	Route::get('/shop/orders', 'ShopController@viewBusinessOrders')->name('shop.orders');

	Route::get('/shop/orders/view', 'ShopController@downloadPDF')->name('shop.ordersDownload');
});




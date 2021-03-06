<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth.checkrole'], function(){
	Route::get('categories', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
	Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
	Route::post('categories/store', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
	Route::get('categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
	Route::post('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);

	Route::get('clients', ['as' => 'clients.index', 'uses' => 'ClientsController@index']);
	Route::get('clients/create', ['as' => 'clients.create', 'uses' => 'ClientsController@create']);
	Route::post('clients/store', ['as' => 'clients.store', 'uses' => 'ClientsController@store']);
	Route::get('clients/edit/{id}', ['as' => 'clients.edit', 'uses' => 'ClientsController@edit']);
	Route::post('clients/update/{id}', ['as' => 'clients.update', 'uses' => 'ClientsController@update']);

	Route::get('products', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
	Route::get('products/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
	Route::post('products/store', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
	Route::get('products/edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
	Route::post('products/update/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
	Route::get('products/delete/{id}', ['as' => 'products.delete', 'uses' => 'ProductsController@delete']);

	Route::get('orders', ['as' => 'orders.index', 'uses' => 'OrdersController@index']);
	Route::get('orders/{id}', ['as' => 'orders.edit', 'uses' => 'OrdersController@edit']);
	Route::post('orders/update/{id}', ['as' => 'orders.update', 'uses' => 'OrdersController@update']);

	Route::get('cupoms', ['as' => 'cupoms.index', 'uses' => 'CupomsController@index']);
	Route::get('cupoms/create', ['as' => 'cupoms.create', 'uses' => 'CupomsController@create']);
	Route::post('cupoms/store', ['as' => 'cupoms.store', 'uses' => 'CupomsController@store']);
	Route::get('cupoms/edit/{id}', ['as' => 'cupoms.edit', 'uses' => 'CupomsController@edit']);
	Route::post('cupoms/update/{id}', ['as' => 'cupoms.update', 'uses' => 'CupomsController@update']);
});

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => 'auth.checkrole.client'], function(){
	Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
	Route::get('order/create', ['as' => 'order.create', 'uses' => 'CheckoutController@create']);
	Route::post('order/store', ['as' => 'order.store', 'uses' => 'CheckoutController@store']);
});

Route::group(['prefix' => 'api', 'as' => 'api.', 'middleware' => 'oauth'], function(){
	Route::get('teste', function() {
	    return ["teste" => "teste"];
	});
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});



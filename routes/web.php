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
    return view('index');
});

/* All Categories-Based Routes*/
Route::get('/categories','CategoriesController@getCategories');

Route::get('/categories/create','CategoriesController@create');

Route::post('/categories', 'CategoriesController@store');

Route::get('/categories/{category}','CategoriesController@viewCategory');

Route::get('/categories/update/{category}', 'CategoriesController@update');

Route::post('/categories/update/{category}', 'CategoriesController@confirmUpdate');

Route::get('/categories/delete/{category}', 'CategoriesController@destroy');

// Route::get('/categories/delete/{product}', 'CategoriesController@destroy');

/* All Products-Routes*/
Route::get('/products/add','ProductsController@create');

Route::post('/products', 'ProductsController@store');

Route::get('/products/{product}','ProductsController@show');

Route::get('/products/update/{product}', 'ProductsController@update');

Route::post('/products/update/{product}', 'ProductsController@confirmUpdate');

Route::get('/products/delete/{product}', 'ProductsController@destroy');


/* All Basket-Based Route */
Route::get('/basket','BasketsController@show');

Route::post('/basket/add-product/{product}','BasketsController@addProduct');

Route::get('/basket/confirm-purchase','BasketsController@confirmPurchase');

Route::get('/basket/invoice/{invoice}','BasketsController@showInvoice');

Route::get('/basket/delete-products/{product}', 'BasketsController@destroy');



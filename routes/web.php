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
})->name('home');

Route::get('/login','LogsController@viewForm')->name('login');

Route::post('/login','LogsController@restore');

Route::get('/logout','LogsController@destroy');

Route::post('/register','LogsController@store');


/* All Categories-Based Routes*/
Route::get('/categories','CategoriesController@getCategories');

Route::get('/categories/create','CategoriesController@create');

Route::post('/categories', 'CategoriesController@store');

Route::get('/categories/{category}','CategoriesController@viewCategory');

Route::get('/categories/update/{category}', 'CategoriesController@update');

Route::post('/categories/update/{category}', 'CategoriesController@confirmUpdate');

Route::get('/categories/delete/{category}', 'CategoriesController@destroy');

Route::get('/categories/{category}/delete/{product}', 'CategoriesController@detachProduct');

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

Route::get('/basket/delete-products/{product}', 'BasketsController@detachProduct');

Route::get('/basket/cancel', 'BasketsController@cancelling');

Route::get('/basket/delete', 'BasketsController@destroy');



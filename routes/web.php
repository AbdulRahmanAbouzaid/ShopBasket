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

Route::get('/categories','CategoriesController@getCategories');
Route::get('/categories/create','CategoriesController@create');
Route::get('/categories/{category}','CategoriesController@viewCategory');

Route::get('/products/add','ProductsController@create');
Route::get('/products/{product}','ProductsController@show');

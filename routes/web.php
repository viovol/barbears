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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/products','ProductController');
Route::resource('/categories','CategoryController');
Route::get('admin_area', ['middleware' => 'admin', function () {}]);
Route::get('/add-to-cart/{id}',['uses'=>'ProductController@getAddToCart','as'=>'product.addToCart']);
Route::get('/shopping-cart',['uses'=>'ProductController@getCart','as'=>'product.shopingCart']);
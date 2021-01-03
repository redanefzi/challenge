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

// to store a new Product
Route::post('products', 'App\Http\Controllers\ProductController@store'); 

// to list products
Route::get('products', 'App\Http\Controllers\ProductController@index');

// to list Categories
Route::get('categories', 'App\Http\Controllers\CategoryController@index');

//Route::resource('categories', 'CategoryController');


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

Route::get('sellers','SellerController@index');
Route::get('sellers/{id}','SellerController@show');
Route::post('sellers','SellerController@create');
Route::put('sellers/{id}','SellerController@update');
Route::patch('sellers/{id}','SellerController@edit');
Route::delete('sellers/{id}','SellerController@delete');

Route::post('sellers/{id}/address','AddressController@create');
Route::put('sellers/{id}/address','AddressController@update');


Route::get('products','ProductController@index');
Route::get('products/{id}','ProductController@show');
Route::post('products','ProductController@create');
Route::put('products/{id}','ProductController@update');
Route::patch('products/{id}','ProductController@edit');
Route::delete('products/{id}','ProductController@delete');

Route::get('products/{id}/reviews','ReviewController@index');
Route::post('products/{id}/reviews','ReviewController@create');
Route::delete('products/{id}/reviews/{id}','ReviewController@delete');


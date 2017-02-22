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
Route::delete('sellers','SellerController@delete');

Route::post('sellers','SellerController@create');
Route::put('sellers','SellerController@update');
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('sellers','SellerController@index');
Route::get('sellers/{id}','SellerController@show');
Route::post('sellers','SellerController@create');
Route::put('sellers/{id}','SellerController@update');
Route::patch('sellers/{id}','SellerController@edit');
Route::delete('sellers/{id}','SellerController@delete');

Route::post('sellers/{id}/addresses','AddressController@create');
Route::put('sellers/{id}/addresses','AddressController@update');

Route::get('products','ProductController@index');
Route::get('products/{id}','ProductController@show');
Route::post('products','ProductController@create');
Route::put('products/{id}','ProductController@update');
Route::patch('products/{id}','ProductController@edit');
Route::delete('products/{id}','ProductController@delete');

Route::get('products/{id}/reviews','ReviewController@index');
Route::post('products/{id}/reviews','ReviewController@create');
Route::delete('products/{product_id}/reviews/{review_id}','ReviewController@delete');

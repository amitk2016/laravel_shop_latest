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

Route::get('/', 'HomeController@index');

Route::get('shop','ShopController@index');
Route::get('shop/AddProduct','ShopController@add')->middleware('auth');
Route::post('submit-product','ShopController@submit')->middleware('auth');
Route::get('shop/{id}','ShopController@show');
Route::get('shop/Delete-Product/{id}','ShopController@delete')->middleware('auth');
Route::get('shop/Edit-Product/{id}','ShopController@edit')->middleware('auth');
Route::post('shop/{id}/update','ShopController@update')->middleware('auth');

Route::get('Aboutus','AboutusController@index');

Route::get('Contact','ContactController@index');

Route::get('cart','CartController@index');
Route::post('cart/Add/{id}','CartController@add')->middleware('auth');


Route::auth();
// Route::get('/home', 'HomeController@index');

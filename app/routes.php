<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$api_route = 'api/';
$api_version = 'v1/';

Route::get('/', function()
{
	//return View::make('hello');
});

// Auth's Routes
Route::get($api_route.$api_version.'login', 'UsersController@index');
Route::post($api_version.'login', 'UsersController@postSignin');

// With Auth
Route::group(array('before'=>'auth'), function()
{	
	Route::get('logout', 'UsersController@getSignout');

});

// Without Auth
Route::get($api_route.$api_version.'categories', 'CategoriesController@index');
Route::get($api_route.$api_version.'category/{id}', 'CategoriesController@show');
Route::post($api_route.$api_version.'category', 'CategoriesController@store');
Route::put($api_route.$api_version.'category/{id}', 'CategoriesController@update');
Route::delete($api_route.$api_version.'category/{id}', 'CategoriesController@destroy');

// Without Auth
Route::get($api_route.$api_version.'products', 'ProductsController@index');
Route::get($api_route.$api_version.'product/{id}', 'ProductsController@show');
Route::post($api_route.$api_version.'product', 'ProductsController@store');
Route::put($api_route.$api_version.'product/{id}', 'ProductsController@update');
Route::delete($api_route.$api_version.'product/{id}', 'ProductsController@destroy');
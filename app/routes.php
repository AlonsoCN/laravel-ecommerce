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

define("API_PREFIX", "api/");
define("V1_PREFIX", "v1");

Route::group(array(
  'prefix' => API_PREFIX.V1_PREFIX,
  'before' => 'auth.basic'),
  function() {
    Route::resource('categories', 'CategoriesController', array('only' => array('store', 'update', 'delete')));
    Route::resource('products', 'ProductsController', array('only' => array('store', 'update', 'delete')));
    Route::resource('attributes', 'AttributesController', array('only' => array('store', 'update', 'delete')));
    Route::resource('images', 'ImagesController', array('only' => array('store', 'update', 'delete')));
    Route::resource('profiles', 'ProfilesController', array('only' => array('store', 'update', 'delete')));
  }
);

Route::group(array(
  'prefix' => API_PREFIX.V1_PREFIX),
  function() {
    // Rutas de auth
    Route::get('login', 'UsersController@index');
    Route::post('login', 'UsersController@login');
    Route::get('logout', 'UsersController@logout');
    // Fin: Rutas de auth

    Route::resource('categories', 'CategoriesController', array('only' => array('index', 'show')));
    Route::resource('products', 'ProductsController', array('only' => array('index', 'show')));
    Route::resource('attributes', 'AttributesController', array('only' => array('index', 'show')));
    Route::resource('images', 'ImagesController', array('only' => array('index', 'show')));
    Route::resource('profiles', 'ProfilesController', array('only' => array('index', 'show')));
  }
);
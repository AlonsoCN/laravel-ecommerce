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
// Tiene más sentido usar constantes para este tipo de cosas, te parece?
define("API_PREFIX", "api/");
define("V1_PREFIX", "v1");

/**
 * - Inicialmente debemos trabajar con auth.basic para todos los requests críticos
 * (Get de data confidencial, Posts, Put, Delete, etc).
 * - Agrupemos dentro del mismo api/v1 todos los request con autenticación
 * - Usemos Route::resource para manejar todos los requests
 */
Route::group(array(
   'prefix' => API_PREFIX.V1_PREFIX,
   'before' => 'auth.basic'),
   function(){
       Route::resource('categories', 'CategoriesController', array('only' => array('create', 'store', 'update', 'delete')));
   }
);
// Podemos llevar todos los GETs 'abiertos' a un grupo aparte (que no tenga filtro de auth) así mantemos publico
Route::group(
   array('prefix' => API_PREFIX.V1_PREFIX),
   function(){
       Route::resource('categories', 'CategoriesController', array('only' => array('index', 'show')));
   }
);

// // Auth's Routes
// Route::get(API_PREFIX.V1_PREFIX.'login', 'UsersController@index');
// Route::post(V1_PREFIX.'login', 'UsersController@postSignin');

// // With Auth
// Route::group(array('before'=>'auth'), function()
// {
// 	Route::get('logout', 'UsersController@getSignout');

// });

// // Without Auth
// Route::get(API_PREFIX.V1_PREFIX.'categories', 'CategoriesController@index');
// Route::get(API_PREFIX.V1_PREFIX.'categories/{id}', 'CategoriesController@show');
// Route::post(API_PREFIX.V1_PREFIX.'categories', 'CategoriesController@store');
// Route::put(API_PREFIX.V1_PREFIX.'categories/{id}', 'CategoriesController@update');
// Route::delete(API_PREFIX.V1_PREFIX.'categories/{id}', 'CategoriesController@destroy');

// // Without Auth
// Route::get(API_PREFIX.V1_PREFIX.'products', 'ProductsController@index');
// Route::get(API_PREFIX.V1_PREFIX.'products/{id}', 'ProductsController@show');
// Route::post(API_PREFIX.V1_PREFIX.'products', 'ProductsController@store');
// Route::put(API_PREFIX.V1_PREFIX.'products/{id}', 'ProductsController@update');
// Route::delete(API_PREFIX.V1_PREFIX.'products/{id}', 'ProductsController@destroy');

// // Without Auth
// Route::get(API_PREFIX.V1_PREFIX.'profiles', 'ProfilesController@index');
// Route::get(API_PREFIX.V1_PREFIX.'profiles/{id}', 'ProfilesController@show');
// Route::post(API_PREFIX.V1_PREFIX.'profiles', 'ProfilesController@store');
// Route::put(API_PREFIX.V1_PREFIX.'profiles/{id}', 'ProfilesController@update');
// Route::delete(API_PREFIX.V1_PREFIX.'profiles/{id}', 'ProfilesController@destroy');

// // Without Auth
// Route::get(API_PREFIX.V1_PREFIX.'images', 'ImagesController@index');
// Route::get(API_PREFIX.V1_PREFIX.'images/{id}', 'ImagesController@show');
// Route::post(API_PREFIX.V1_PREFIX.'images', 'ImagesController@store');
// Route::put(API_PREFIX.V1_PREFIX.'images/{id}', 'ImagesController@update');
// Route::delete(API_PREFIX.V1_PREFIX.'images/{id}', 'ImagesController@destroy');

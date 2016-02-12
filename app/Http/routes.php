<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::group(['middleware' => ['web']], function () {
    // your routes here

	// Route::get('auth/login', 'Auth\AuthController@getLogin');
	// Route::post('auth/login', 'Auth\AuthController@postLogin');



	

	// // Registration routes...
	// Route::get('auth/register', 'Auth\AuthController@getRegister');
	// Route::post('auth/register', 'Auth\AuthController@postRegister');




});



// Route::get('logout', [ 'uses' => 'Auth\AuthController@getLogout', 'as' => 'logout' ]);





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and incldues session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function () {
    Route::auth();
	Route::resource('pages','PagesController');
	Route::get('domains/find','PagesController@findByDomain');
    Route::get('/', 'HomeController@index');
});

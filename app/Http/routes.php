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


});




Route::group(['middleware' => 'web'], function () {
    Route::auth();
	Route::resource('pages','PagesController');
	Route::get('domains/find','PagesController@findDomain');
	Route::get('findPages','PagesController@findByDomain');
	Route::get('topDomains',['uses' => 'DomainController@index', 'as'=>'domain.index']);
    Route::get('/', ['uses' =>'HomeController@index','as'=>'index']);
    Route::get('domains/top','DomainController@gtopDomains');
});

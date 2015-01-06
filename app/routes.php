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

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@fb']);
Route::get('/obtenerGrupos', ['as' => 'home', 'uses' => 'HomeController@obtenerGrupos']);
Route::get('/pruebin', ['as' => 'home', 'uses' => 'HomeController@pruebin']);
Route::get('/grupo', ['as' => 'home', 'uses' => 'HomeController@grupo']);

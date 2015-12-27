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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/emailAnonimo', ['as' => 'home', 'uses' => 'SmsController@emailAnonimo']);
Route::get('/sms', ['as' => 'home', 'uses' => 'SmsController@clickTell']);
Route::get('/mailrand', ['as' => 'home', 'uses' => 'SmsController@emailAleatorio']);

Route::get('/circle', ['as' => 'home', 'uses' => 'HomeController@circle']);


Route::get('/daleware', ['as' => 'home', 'uses' => 'HomeController@daleware']);


Route::get('/fb', ['as' => 'home', 'uses' => 'HomeController@fb']);
Route::get('/obtenerGrupos', ['as' => 'home', 'uses' => 'HomeController@obtenerGrupos']);
Route::get('/pruebin', ['as' => 'home', 'uses' => 'HomeController@pruebin']);
Route::get('/grupo', ['as' => 'home', 'uses' => 'HomeController@grupo']);
Route::get('/cumpleanos', ['as' => 'home', 'uses' => 'HomeController@cumpleanos']);
Route::get('/spammer', ['as' => 'home', 'uses' => 'HomeController@spammer']);
Route::get('/selecAmigos', ['as' => 'home', 'uses' => 'HomeController@selecAmigos']);
Route::get('/aleatorio', ['as' => 'home', 'uses' => 'HomeController@aleatorio']);
Route::get('/subirFoto', ['as' => 'home', 'uses' => 'HomeController@subirFoto']);
Route::get('/spammerPicture', ['as' => 'home', 'uses' => 'HomeController@spammerPicture']);
Route::get('/titulos', ['as' => 'home', 'uses' => 'HomeController@titulos']);

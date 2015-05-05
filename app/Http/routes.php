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


use App\Link;
use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('links', 'LinksController@index');
Route::get('links/form', 'LinksController@createLink');
Route::post('links/form', 'LinksController@storeLink');
Route::get('links/{hash}','LinksController@shortUrl');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//views
Route::get('/', 'mainController@index');
Route::get('/register', 'mainController@register');
Route::get('/login', 'mainController@login');
Route::get('/create', 'setupController@showCreateSetup');


//user authentication
Route::post('/login', 'loginController@login');
Route::post('/register', 'loginController@register');
Route::get('/logout', 'loginController@logout');

//setup
Route::post('/create', 'setupController@createSetup');



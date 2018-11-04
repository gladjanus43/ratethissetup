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
Route::post('/userdetails', 'loginController@changeUserDetails');


//Admin
Route::get('/admin', 'mainController@admin');
Route::get('/makeadmin/{id}', 'loginController@makeAdmin');
Route::get('/removeadmin/{id}', 'loginController@removeAdmin');
Route::get('/deleteuser/{id}', 'loginController@deleteUser');

Route::get('/myprofile', 'mainController@myProfile');

//setup
Route::post('/create', 'setupController@createSetup');
Route::get('/setups', 'setupController@loadSetups');
Route::get('/setups/category/{name}', 'setupController@setupsPerCategory');
Route::get('/setup/{id}', 'setupController@setupDetail');
Route::post('/setupActive' , 'setupController@setupActive');


//comment
Route::post('/comment', 'commentController@postComment');
Route::post('/destroy', 'commentController@deleteComment');
Route::post('/commentup', 'commentController@commentUp');
Route::post('/commentdown', 'commentController@commentdown');

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

Route::get('/', function () {
	if(Auth::check())
	{
		return view('home');
	}
	else
	{
		return view('welcome');
	}
});
Route::get('Signup','UserController@signupForm');
Route::get('Login','UserController@loginForm');
Route::post('Signup','UserController@signup');
Route::post('Login','UserController@login');
Route::post('addTask','UserController@addTask');
Route::get('about','UserController@about');
Route::post('edit-profile','UserController@editProfile');
Route::delete('deleteTask/{id}','UserController@deleteTask');
Route::group(['middleware'=>'auth'],function()
{
	Route::get('home','UserController@home');
	Route::get('edit-profile','UserController@profile');
	Route::get('addTask','UserController@addTaskForm');
	Route::get('allTask','UserController@allTask');
	Route::get('Logout','UserController@logout');

});



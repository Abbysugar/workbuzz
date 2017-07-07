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

/**
 *Routes for the welcome page,
 *login and logout
 */
Route::get('/', 'PageController@index')->name('welcome');
Auth::routes();

/**
 * Routes for home, add users,
 * view all employees and view profile
 * pages
 */
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/adduser', 'HomeController@addUser')->name('adduser');
// Route::post('/adduser', 'HomeController@saveUser')->name('saveuser');

Route::get('/employees', 'HomeController@getEmployees')->name('employees');
Route::any('/myprofile', 'HomeController@getProfile')->name('profile');
Route::get('/userprofile/{user_id}', 'AdminController@viewUser')->name('userprofile');

/**
 * Routes for Admin to view,
 * edit and delete users
 */
Route::group(['middleware' => ['admin']], function () {
	Route::any('/adduser', 'HomeController@saveUser')->name('adduser');
	Route::any('/updateuser/{user_id}', 'AdminController@editUser')->name('updateuser');
	Route::get('/deleteuser/{user_id}', 'AdminController@deleteUser')->name('deleteuser');
});
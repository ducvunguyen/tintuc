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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
	'namespace' => 'Admin',
	'prefix' => 'admin',
	'as'	=> 'admin.',
	'middleware' => ['auth'],
], function(){
	Route::group([
			'prefix' => 'user',
			'as'	=> 'user.',
			'middleware' => 'CheckPermission:user-list',
		], function(){
		Route::get('/', 'UserController@index')->name('index');
		Route::get('/create', 'UserController@create')->name('create');
		Route::post('/store', 'UserController@store')->name('store');

		Route::get('/edit/{id}', 'UserController@edit')->name('edit');
		Route::post('/update/{id}', 'UserController@update')->name('update');
		Route::get('/delete/{id}', 'UserController@delete')->name('delete');
	});

	Route::group([
			'prefix' => 'role',
			'as'	=> 'role.',
			'middleware' => ['CheckPermission:role-list'],
		], function(){
		Route::get('/', 'RoleController@index')->name('index');
		Route::get('/create', 'RoleController@create')->name('create');
		Route::post('/store', 'RoleController@store')->name('store');

		Route::get('/edit/{id}', 'RoleController@edit')->name('edit');
		Route::post('/update/{id}', 'RoleController@update')->name('update');
		Route::get('/delete/{id}', 'RoleController@delete')->name('delete');
	});
});
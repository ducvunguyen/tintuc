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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
	'namespace' => 'Admin',
	'prefix' => 'admin',
	'as'	=> 'admin.',
	'middleware' => ['CheckAdminLogin','web'],
], function(){
	Route::group([
			'prefix' => 'user',
			'as'	=> 'user.',
			// 'middleware' => 'CheckPermission:user-list',
		], function(){
		Route::get('/', 'UserController@index')->name('index')->middleware('CheckPermission:user-list');
		Route::get('/create', 'UserController@create')->name('create')->middleware('CheckPermission:user-add');
		Route::post('/store', 'UserController@store')->name('store')->middleware('CheckPermission:user-add');

		Route::get('/edit/{id}', 'UserController@edit')->name('edit')->middleware('CheckPermission:user-edit');
		Route::post('/update/{id}', 'UserController@update')->name('update')->middleware('CheckPermission:user-edit');
		Route::get('/delete/{id}', 'UserController@delete')->name('delete')->middleware('CheckPermission:user-delete');
	});

	Route::group([
			'prefix' => 'role',
			'as'	=> 'role.',
			// 'middleware' => ['CheckPermission:role-list'],
		], function(){
		Route::get('/', 'RoleController@index')->name('index')->middleware('CheckPermission:role-list');
		Route::get('/create', 'RoleController@create')->name('create')->middleware('CheckPermission:role-add');
		Route::post('/store', 'RoleController@store')->name('store')->middleware('CheckPermission:role-add');

		Route::get('/edit/{id}', 'RoleController@edit')->name('edit')->middleware('CheckPermission:role-edit');
		Route::post('/update/{id}', 'RoleController@update')->name('update')->middleware('CheckPermission:role-edit');
		Route::get('/delete/{id}', 'RoleController@delete')->name('delete')->middleware('CheckPermission:role-delete');
	});
});



Route::group([
		'namespace' => 'Admin',
		'as'	=> 'login.',
		'prefix' => 'login'
], function(){
	Route::get('/', function() {
	    return view('admin.auth.login');
	})->name('form_login');

	Route::post('/login', 'AdminLoginController@login')->name('login_user');
	Route::any('logout', 'AdminLoginController@logout')->name('logout');


});
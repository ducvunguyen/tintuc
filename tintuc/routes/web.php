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

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('dashboard', 'AdminController@index')->name('admin')->middleware('auth:admin');

Route::group([
	'namespace' => 'Admin',
	'prefix' => 'admin',
	'as'	=> 'admin.',
	'middleware' => ['CheckAdminLogin','web'],
], function(){
	Route::get('/dashboard', function(){
		return view('admin.dashboard');
	})->name('dashboard');	
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

	Route::group([
		'prefix' => 'category',
		'as'	=> 'category.'
	], function(){
		Route::get('/', 'CategoryController@index')->name('index');
		Route::get('/create', 'CategoryController@create')->name('create');
		Route::post('/store', 'CategoryController@store')->name('store');
		Route::get('/modal-edit/{id}', 'CategoryController@getEditModal')->name('edit-modal');
		Route::post('/update/{id}', 'CategoryController@update')->name('update');
		Route::post('/delete/{id}', 'CategoryController@delete')->name('delete');
		Route::get('/modal-delete/{id}', 'CategoryController@getDeleteModal')->name('delete-modal');
	});

	Route::group([
		'prefix' => 'banner',
		'as'	=> 'banner.'
	], function(){
		Route::get('/', 'BannerController@index')->name('index');
		Route::post('/store', 'BannerController@store')->name('store');
		Route::get('/modal-edit/{id}', 'BannerController@getEditModal')->name('edit-modal');
		Route::post('/update/{id}', 'BannerController@update')->name('update');
		Route::post('/delete/{id}', 'BannerController@delete')->name('delete');
		Route::get('/modal-delete/{id}', 'BannerController@getDeleteModal')->name('delete-modal');
	});

	Route::group([
		'prefix' => 'post',
		'as'	=> 'post.'
	], function(){
		Route::get('/', 'PostController@index')->name('index');
		Route::post('/store', 'PostController@store')->name('store');
		Route::get('/create', 'PostController@create')->name('create');
		Route::get('/modal-edit/{id}', 'PostController@getEditModal')->name('edit-modal');
		Route::post('/update/{id}', 'PostController@update')->name('update');
		Route::post('/delete/{id}', 'PostController@delete')->name('delete');
		Route::get('/modal-delete/{id}', 'PostController@getDeleteModal')->name('delete-modal');
		Route::get('/show/{id}', 'PostController@show')->name('show');
	});
});



Route::group([
		'namespace' => 'Admin',
		'as'	=> 'login.',
		'prefix' => 'user'
], function(){
	Route::get('login', function() {
	    return view('admin.auth.login');
	})->name('form_login');

	Route::post('/login', 'UserLoginController@login')->name('login_user');
	Route::any('logout', 'UserLoginController@logout')->name('logout');
});


// Route::group([
// 	'namespace' => 'Customer',
// 	'as'	=> 'customer.',
// 	'prefix' => 'customer',
// ], function(){
// 	Route::get('/login', 'AdminLoginController@showlogin')->name('showlogin');
// 	Route::post('/login', 'AdminLoginController@login')->name('login');
// 	Route::any('/logout', 'AdminLoginController@logout')->name('logout');
// });
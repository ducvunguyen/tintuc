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
// dd(app()->make('hello'));

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware(['can:edit-profile']);
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
			// 'middleware' => ['CheckPermission:role-list'],
		], function(){
		Route::get('/', 'RoleController@index')->name('index');
		Route::get('/create', 'RoleController@create')->name('create');
		Route::post('/store', 'RoleController@store')->name('store');

		Route::get('/edit/{id}', 'RoleController@edit')->name('edit');
		Route::post('/update/{id}', 'RoleController@update')->name('update');
		Route::get('/delete/{id}', 'RoleController@delete')->name('delete');
	});

	Route::group([
			'prefix' => 'permission',
			'as'	=> 'permission.',
			// 'middleware' => ['CheckPermission:role-list'],
		], function(){
		Route::get('/', 'PermissionController@index')->name('index');
		// Route::get('/loaddata', 'PermissionController@loadData')->name('loadData');
		Route::get('/create', 'PermissionController@create')->name('create');
		Route::post('/store', 'PermissionController@store')->name('store');
		Route::get('/edit/{id}', 'PermissionController@edit')->name('edit');
		Route::post('/update/{id}', 'PermissionController@update')->name('update');
		Route::get('/delete/{id}', 'PermissionController@delete')->name('delete');
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
	
	Route::group([
		'prefix'=>'comment',
		'as' => 'comment.',
	], function(){
		Route::get('/index', 'CommentController@index')->name('index');
		Route::post('/load-data-item', 'CommentController@loadDataTable')->name('load-data');
		Route::post('/add', 'CommentController@add')->name('add');
		Route::post('/store', 'CommentController@store')->name('store');
		Route::post('/edit', 'CommentController@edit')->name('edit');
		Route::post('/update', 'CommentController@update')->name('update');
		Route::post('/delete', 'CommentController@delete')->name('delete');
		Route::post('/destroy', 'CommentController@destroy')->name('destroy');
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
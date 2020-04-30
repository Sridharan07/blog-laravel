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



Auth::routes();

Route::get('/', 'BlogController@index')->name('blog');
Route::get('/{slug}','BlogController@isi_blog')->name('blog.isi');
Route::get('/category/{category}','BlogController@list_category')->name('category.list');
Route::get('/tag/{tag}','BlogController@list_tag')->name('tag.list');
Route::get('/author/{user}','BlogController@list_author')->name('author.list');
Route::get('/list/post','BlogController@list_blog')->name('blog.list');
Route::get('/search/post','BlogController@search_blog')->name('blog.search');
Route::get('/contact/us','BlogController@contact_us')->name('blog.contact_us');
Route::get('/about/us','BlogController@about_us')->name('blog.about_us');

Route::get('/sitemap/all', 'SiteMapController@index');
Route::get('/sitemap/posts', 'SiteMapController@posts');
Route::get('/sitemap/categories', 'SiteMapController@categories');

Route::get('/register', function(){
	return redirect()->back();
});
//This route can only be accessed if it is logged in
Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function(){
	
	//THIS IS A ROUTE MANUAL
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/post/create', 'PostController@create')->name('post.create');
	Route::post('/post/store', 'PostController@store')->name('post.store');
	Route::get('/post/index', 'PostController@index')->name('post.index');
	Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.destroy');
	Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
	Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed')->middleware('admin');
	Route::get('/post/kill/{id}', 'PostController@kill')->name('post.kill')->middleware('admin');
	Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore')->middleware('admin');
	Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
	Route::get('/post/check_slug', 'PostController@check_slug')->name('post.check_slug');


	Route::get('/category/index', 'CategoryController@index')->name('category.index');
	Route::get('/category/create', 'CategoryController@create')->name('category.create');
	Route::post('/category/store', 'CategoryController@store')->name('category.store');
	Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
	Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
	Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
	//Test route manual above

	//Route Resource can be checked in php artisan route: list using the method (GET,POST,PUT,DELETE, PATCH)
	Route::resource('tag','TagsController');

	Route::resource('user','UserController');
	Route::get('user/admin/{id}', 'UserController@admin')->name('user.admin');
	Route::get('user/author/{id}', 'UserController@author')->name('user.author');

	Route::get('profile','ProfileController@index')->name('profile');
	Route::post('profile/update','ProfileController@update')->name('profile.update');

	Route::get('setting','SettingController@index')->name('setting');
	Route::post('setting/update/{id}','SettingController@update')->name('setting.update');

	Route::get('/file_manager_file', function(){
		return view('admin.file_manager.file_manager_file');
	})->name('file.file_manager_file');

	Route::get('/file_manager_images', function(){
		return view('admin.file_manager.file_manager_images');
	})->name('file.file_manager_images');


});








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

Route::get('/', "HomeController@index")->name('home');

Route::get('/game-review', function(){
    return view('reviews');
})->name('reviews');

Route::get('/single', function(){
    return view('single-review');
})->name('single');

Route::get('/articles', function(){
    return view('articles');
});

Route::get('/profile/{username}', 'HomeController@show')->name('profile');

Route::resource('products', 'ProductController');

// edit
// Route::get('pay', 'HomeController@store');
Route::get('users/{username}', 'HomeController@show');
// Route::delete('users/{id}', 'HomeController@destroy');

Route::get('login', 'LoginController@index')->name('login.index');
Route::post('login', 'LoginController@login')->name('login');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::get('register', 'RegisterController@index')->name('register.index');
Route::post('register', 'RegisterController@store')->name('register.store');

Route::get('/admin', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.index');
// Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('admin/users', 'UsersController@index')->name('users.index')->middleware('checkLogIn');
Route::get('admin/users/{id}/edit', 'UsersController@edit')->name('users.edit');
Route::delete('admin/users/{id}', 'UsersController@destroy')->name('users.destroy');

Route::put('admin/users/{id}', 'UsersController@update')->name('users.update');
Route::put('admin/users/{id}/ban', 'UsersController@update');

Route::resource('posts', 'PostsController');

// Route::get('api/users', 'ApiUsersController@index');

Route::get('comments/{id}', 'CommentsController@get_comments');
Route::post('comments', 'CommentsController@store');

Route::get('contact', 'ContactController@index')->name('contact.index');
Route::post('contact', 'ContactController@contact_admin')->name('contact.send');
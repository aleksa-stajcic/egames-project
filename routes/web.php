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

Route::get('/profile/{username}', function($username){
   return $username;
});

Route::resource('products', 'ProductController');

// edit
Route::get('pay', 'HomeController@store');
Route::get('users/{id}', 'HomeController@show');
// Route::delete('users/{id}', 'HomeController@destroy'); 

Route::get('login', 'LoginController@index')->name('login.index');
Route::post('login', 'LoginController@login')->name('login');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::get('register', 'RegisterController@index')->name('register.index');
Route::post('register', 'RegisterController@store')->name('register.store');

Route::get('users', 'UsersController@index');
Route::get('users/{id}/edit', 'UsersController@edit')->name('users.edit');
Route::delete('users/{id}/ban', 'UsersController@ban')->name('users.ban');

Route::resource('posts', 'PostsController');

Route::get('api/users', 'ApiUsersController@index');
Route::get('comments/{id}', 'CommentsController@get_comments');
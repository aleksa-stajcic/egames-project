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

Route::get('/games', 'GamesController@index')->name('games.index');
Route::get('/games/create', 'GamesController@create')->name('games.create');
Route::post('/games', 'GamesController@store')->name('games.store');
Route::get('/games/{id}', 'GamesController@show')->name('games.show');

Route::get('editor/games', 'GamesController@editor')->name('games.editor');

Route::get('reviews/{id}', 'ReviewsController@get_reviews')->name('reviews.get');
Route::post('reviews', 'ReviewsController@store')->name('reviews.store');

Route::get('/profile/{username}', 'HomeController@show')->name('profile');

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


Route::get('comments/{id}', 'CommentsController@get_comments');
Route::post('comments', 'CommentsController@store');

Route::get('contact', 'ContactController@index')->name('contact.index');
Route::post('contact', 'ContactController@contact_admin')->name('contact.send');

Route::get('api/users', 'Api\ApiUsersController@index');
// Route::get('fill/reviews', 'ApiFillController@reviews');
// Route::get('fill/posts', 'ApiFillController@posts');
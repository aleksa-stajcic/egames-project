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
Route::get('/games/create', 'GamesController@create')->name('games.create')->middleware('login:1');

Route::get('games/platform/{id}', 'GamesController@per_platform')->name('games.platform');

Route::post('/games', 'GamesController@store')->name('games.store');
Route::get('/games/{id}', 'GamesController@show')->name('games.show');
Route::put('games/{id}', 'GamesController@update')->name('games.update')->middleware('login:1');
Route::delete('/games/{id}', 'GamesController@destroy')->name('games.destroy')->middleware('login:1');

Route::get('editor/games', 'GamesController@editor')->name('games.editor')->middleware('login:1', 'role:editor');

Route::get('reviews/{id}', 'ReviewsController@get_reviews')->name('reviews.get');
Route::post('reviews', 'ReviewsController@store')->name('reviews.store')->middleware('login:1');

Route::get('/profile/{username}', 'HomeController@show')->name('profile');

Route::get('login', 'LoginController@index')->name('login.index')->middleware('login:0');
Route::post('login', 'LoginController@login')->name('login')->middleware('login:0');
Route::get('logout', 'LoginController@logout')->name('logout')->middleware('login:1');

Route::get('register', 'RegisterController@index')->name('register.index')->middleware('login:0');
Route::post('register', 'RegisterController@store')->name('register.store')->middleware('login:0');

Route::get('/admin', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.index')->middleware('login:1', 'role:admin');

Route::get('admin/users', 'UsersController@index')->name('users.index')->middleware('login:1', 'role:admin');
Route::get('admin/users/{id}/edit', 'UsersController@edit')->name('users.edit')->middleware('login:1', 'role:admin');
Route::delete('admin/users/{id}', 'UsersController@destroy')->name('users.destroy')->middleware('login:1', 'role:admin');

Route::put('admin/users/{id}', 'UsersController@update')->name('users.update')->middleware('login:1', 'role:admin');
Route::put('admin/users/{id}/ban', 'UsersController@update')->middleware('login:1', 'role:admin');

Route::get('posts', 'PostsController@index')->name('posts.index');
Route::get('posts/create', 'PostsController@create')->name('posts.create')->middleware('login:1', 'role:admin,editor,moderator');
Route::post('posts', 'PostsController@store')->name('posts.store')->middleware('login:1', 'role:admin,editor,moderator');
Route::get('posts/{post}', 'PostsController@show')->name('posts.show');

Route::get('comments/{id}', 'CommentsController@get_comments');
Route::post('comments', 'CommentsController@store')->middleware('login:1');

Route::get('contact', 'ContactController@index')->name('contact.index');
Route::post('contact', 'ContactController@contact_admin')->name('contact.send');

Route::get('api/users', 'Api\ApiUsersController@index');
Route::get('api/games', 'Api\ApiGamesController@index');

Route::get('author', function ()
{
    return view('author');
})->name('author');

// Route::get('fill/reviews', 'Api\ApiFillController@reviews');
// Route::get('fill/posts', 'Api\ApiFillController@posts');

Route::fallback(function()
{
    return view('404');
})->name('fallback');
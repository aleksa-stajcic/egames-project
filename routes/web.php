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
    return view('game-review');
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
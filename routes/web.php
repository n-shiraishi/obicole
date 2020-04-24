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

Route::get('/', 'ObipostsController@index');


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ機能
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', 'UsersController', ['only' => ['show']]);
    
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
        Route::get('wishes', 'UsersController@wishes')->name('users.wishes');
    });
    
    Route::group(['prefix' => 'obiposts/{id}'], function() {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
        Route::post('wish', 'WishesController@store')->name('wishes.wish');
        Route::delete('unwished', 'WishesController@destroy')->name('wishes.unwished');
    });
    
    Route::resource('obiposts', 'ObipostsController');
});


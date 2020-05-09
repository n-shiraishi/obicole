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

// パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// ユーザ機能
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', 'UsersController');
    Route::get('favorites_rank', 'TopController@favorites_rank')->name('top.favorites_rank');
    Route::get('wishes_rank', 'TopController@wishes_rank')->name('top.wishes_rank');
    Route::get('search','ObipostsController@search')->name('obiposts.search');

    Route::group(['prefix' => 'users/{id}'], function() {
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
        Route::get('wishes', 'UsersController@wishes')->name('users.wishes');
    });
    
    Route::group(['prefix' => 'obiposts/{id}'], function() {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
        Route::post('wish', 'WishesController@store')->name('wishes.wish');
        Route::delete('unwished', 'WishesController@destroy')->name('wishes.unwished');
        Route::get('favorite_users', 'ObipostsController@favorite_users')->name('obiposts.favorite_users');
        Route::get('wishing_users', 'ObipostsController@wishing_users')->name('obiposts.wishing_users');
        Route::get('book_title', 'ObipostsController@book_title')->name('obiposts.book_title');
        Route::get('book_author', 'ObipostsController@book_author')->name('obiposts.book_author');
        Route::get('book_info', 'BooksController@book_info')->name('books.book_info');

    });
    
    Route::resource('obiposts', 'ObipostsController');
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

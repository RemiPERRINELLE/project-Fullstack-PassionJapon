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

use App\Ideas;


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('articles', 'ArticlesController');

Route::resource('ideas', 'IdeasController');

Route::resource('travels', 'TravelController');

Route::resource('categories', 'CategoryController');

Route::resource('reactions', 'ReactionController');

Route::resource('media', 'MediaController');

Route::resource('users', 'UserController');
Route::get('user/profile', 'UserController@profile')->name('profile');
Route::get('user/comments', 'UserController@comments')->name('comments');
Route::get('user/commands', 'UserController@commands')->name('commands');
Route::get('user/password/{user}/editPassword', 'UserController@editPassword')->name('edit.password');
Route::put('user/password/{user}/update', 'UserController@updatePassword')->name('update.password');

Route::get('admin/moderation', 'AdminController@moderation')->name('moderation');
Route::get('admin/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::put('admin/moderation/{user}', 'AdminController@banUpdate')->name('banUpdate');

Route::resource('sales', 'SaleController');

Route::view('games/index', 'games.index')->name('games');
Route::view('games/shifumi', 'games.shifumi')->name('shifumi');
Route::view('games/snake', 'games.snake')->name('snake');
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

Route::get('/', function () {
    // return view('welcomeLaravel');
    return view('home');
})->name('home');

// Route::get('/home', 'HomeController@index')->name('homeLaravel');



// Route::get('/user/profile', function () {
//     return view('user/profile');
// })->name('profile');

// Route::get('/user/comments', function () {
//     return view('user/comments');
// })->name('comments');

// Route::get('/user/commands', function () {
//     return view('user/commands');
// })->name('commands');






Auth::routes();



Route::resource('articles', 'ArticlesController');

Route::resource('ideas', 'IdeasController');

Route::resource('travels', 'TravelController');

Route::resource('categories', 'CategoryController');

Route::resource('reactions', 'ReactionController');

Route::resource('media', 'MediaController');

Route::resource('users', 'UserController');
Route::get('user/profile', 'UserController@profile')->name('profile');
Route::get('user/password/{user}/editPassword', 'UserController@editPassword')->name('edit.password');
Route::put('user/password/{user}/update', 'UserController@ua')->name('update.password');

Route::get('user/comments', 'UserController@comments')->name('comments');
Route::get('user/commands', 'UserController@commands')->name('commands');

Route::get('admin/moderation', 'AdminController@moderation')->name('moderation');
Route::get('admin/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::put('admin/moderation/{id}', 'AdminController@banUpdate')->name('banUpdate');

Route::get('category/travels', 'TravelController@index')->name('travels.category');

Route::get('user/reactions', 'ReactionController@index')->name('reactions.user');

Route::get('idea/reactions', 'ReactionController@index')->name('reactions.idea');

Route::get('travel/reactions', 'ReactionController@index')->name('reactions.travel');
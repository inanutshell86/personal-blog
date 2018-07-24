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

Route::get('/', 'PublicController@index')->name('index');
Route::get('post/{post}', 'PublicController@singlePost')->name('singlePost');
Route::get('about', 'PublicController@about')->name('about');

Route::get('contact', 'PublicController@contact')->name('contact');
Route::post('contact', 'PublicController@about')->name('contactPost');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('admin')->group(function() {
    Route::get('/dashboard', 'AdminController@dashboard')->name('adminDashboard');
});

Route::prefix('user')->group(function() {
    Route::get('dashboard', 'UserController@dashboard')->name('userDashboard');
    Route::get('comments', 'UserController@comments')->name('userComments');
    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'UserController@profilePost')->name('userProfilePost');
    Route::post('comment/{id}/delete', 'UserController@deleteComment')->name('deleteComment');

});

Route::prefix('author')->group(function() {
    Route::get('dashboard', 'AuthorController@dashboard')->name('authorDashboard');
    Route::get('posts', 'AuthorController@posts')->name('authorPosts');
    Route::get('comments', 'AuthorController@comments')->name('authorComments');
    Route::get('posts/new', 'AuthorController@newPost')->name('authorNewPost');
    Route::post('posts/new', 'AuthorController@createPost')->name('authorCreatePost');
    Route::get('post/{id}/edit', 'AuthorController@editPost')->name('authorEditPost');
    Route::post('post/{id}/edit', 'AuthorController@postEditPost')->name('authorPostEditPost');
    Route::post('post/{id}/remove', 'AuthorController@removePost')->name('authorRemovePost');

});

Route::prefix('admin')->group(function() {
    Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');
    Route::get('posts', 'AdminController@posts')->name('adminPosts');
    Route::get('comments', 'AdminController@comments')->name('adminComments');
    Route::get('users', 'AdminController@users')->name('adminUsers');
    Route::get('post/{id}/edit', 'AdminController@editPost')->name('adminEditPost');
    Route::post('post/{id}/edit', 'AdminController@postEditPost')->name('adminPostEditPost');
    Route::post('post/{id}/remove', 'AdminController@removePost')->name('adminRemovePost');
    Route::post('comment/{id}/remove', 'AdminController@removeComment')->name('adminRemoveComment');
    Route::get('user/{id}/edit', 'AdminController@editUser')->name('adminEditUser');
    Route::post('user/{id}/edit', 'AdminController@editUserPost')->name('adminEditUserPost');
    Route::post('user/{id}/remove', 'AdminController@removeUser')->name('adminRemoveUser');
});

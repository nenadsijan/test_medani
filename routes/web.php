<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

//posts
Route::get('/posts', 'App\Http\Controllers\PostController@posts')->name('posts')->middleware('auth')->middleware('is_admin');
Route::get('/create-post', 'App\Http\Controllers\PostController@create')->name('create.post')->middleware('auth')->middleware('is_admin');
Route::post('/store-post', 'App\Http\Controllers\PostController@store')->name('store.post')->middleware('auth')->middleware('is_admin');
Route::get('/edit-post/{id}', 'App\Http\Controllers\PostController@edit')->name('edit.post')->middleware('auth')->middleware('is_admin');
Route::post('/update-post/{id}', 'App\Http\Controllers\PostController@update')->name('update.post')->middleware('auth')->middleware('is_admin');
Route::get('/destroy-post/{id}', 'App\Http\Controllers\PostController@destroy')->name('destroy.post')->middleware('auth')->middleware('is_admin');
Route::get('/post/{slug}', 'App\Http\Controllers\PostController@show')->name('show.post')->middleware('auth');



//like
Route::post('/like', 'App\Http\Controllers\HomeController@like')->name('post.like')->middleware('auth');


//users
Route::get('/users', 'App\Http\Controllers\UserController@users')->name('users')->middleware('is_admin');
Route::get('/edit-user/{id}', 'App\Http\Controllers\UserController@edit')->name('edit.user')->middleware('auth')->middleware('is_admin')->middleware('is_user_role'); 
Route::post('/update-user/{id}', 'App\Http\Controllers\UserController@update')->name('update.user')->middleware('auth')->middleware('is_admin')->middleware('is_user_role'); 


//comments
Route::get('/comments', 'App\Http\Controllers\CommentController@comments')->name('comments')->middleware('is_admin');
Route::post('/comment-store', 'App\Http\Controllers\CommentController@store')->name('store.comment')->middleware('auth');
Route::get('/edit-comment/{id}', 'App\Http\Controllers\CommentController@edit')->name('edit.comment')->middleware('auth')->middleware('is_admin');
Route::post('/update-comment/{id}', 'App\Http\Controllers\CommentController@update')->name('update.comment')->middleware('auth')->middleware('is_admin');
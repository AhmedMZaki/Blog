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


//Route::post('/posts/{post}/comments','CommentsController@store');
 Route::get('/','PostsController@index')->name('home');
Route::resource('/posts','PostsController');
Route::get('/auth',function(){ return view('posts.auth');});
Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');

Route::get('/logout','SessionsController@destroy');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

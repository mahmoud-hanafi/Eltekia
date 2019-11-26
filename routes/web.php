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
    return view('welcome');
});

Route::get('/about','PagesController@about')->name('aboutpage');
Route::get('/home','PagesController@home')->name('homepage');
Route::get('/contact','PagesController@contact')->name('contactpage');
Route::post('/dosend' , 'PagesController@dosend');
Route::post('/search' , 'PagesController@search');
Route::resource('posts','PostsController');
Route::resource('accounts','accounts');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

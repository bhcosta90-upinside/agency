<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'SiteController@home')->name('home');
Route::get('/artigos', 'SiteController@posts')->name('posts');
Route::get('/artigo/{slug}', 'SiteController@post')->name('post');
Route::get('/categoria/{slug}', 'SiteController@category')->name('category');
Route::get('/contato', 'SiteController@contact')->name('contact');
Route::get('/sobre', 'SiteController@about')->name('about');
Route::get('/artigos/usuario/{user}', 'SiteController@postUsuario')->name('post-user');

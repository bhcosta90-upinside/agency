<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('newsletter', 'ApiController@newsletter')->name('api.newsletter');
Route::post('commentary/{slug}', 'ApiController@commentary')->name('api.commentary');
Route::post('contact', 'ApiController@contact')->name('api.contact');

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


Route::get('/updated-activity','TelegramController@updateActivity');
Route::get('/','TelegramController@sendMessage');
Route::post('/send-message','TelegramController@storeMessge');
Route::post('/store-photo','TelegramController@storePhoto');

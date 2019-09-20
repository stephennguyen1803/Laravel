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

Route::get('/feeds','FeedsController@index');

Route::get('/feeds/create','FeedsController@create');

Route::get('/feeds/detail','FeedsController@getFeedById')->name('feed.detail');

Route::post('/feedscreate','FeedsController@storeFeeds');

Route::post('/feedsupdate','FeedsController@updateFeeds');

Route::post('/feedsdelete','FeedsController@deleteFeeds');



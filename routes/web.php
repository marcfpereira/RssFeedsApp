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

Route::post('/rss', 'rssUrlStoreController@storeUrl');
Route::get('/rss/link', 'rssUrlStoreController@getUrl');
Route::get('/rss/link{id}', 'rssUrlStoreController@getUrlByid');

Route::get ('/scrapingdata', 'ScrapingDataController@StoreFeeds');
Route::get('/scrapingdata/show','ScrapingDataController@showAll');
Route::get('/scrapingdata/show/{id}','ScrapingDataController@showById');
Route::delete('/scrapingdata/delete/{id}','ScrapingDataController@destroy');


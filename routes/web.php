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

/*===============-Ads Controller-======================*/
Route::get('/', "Ads\AdsController@index")->name('home');
Route::get('/ad/edit', "Ads\AdsController@add");
Route::post('/ad/store', "Ads\AdsController@store");
Route::get('/ad/{id}', "Ads\AdsController@show");
Route::DELETE('/ads/{ad}/remove', "Ads\AdsController@remove");
Route::get('/ads/{ad}/edit', "Ads\AdsController@edit");
Route::PATCH('/ads/{ad}/edit', "Ads\AdsController@update");


/*===============-Auth Controller-======================*/
Route::get('/login', "Auth\AuthController@create")->name('login');
Route::post('/login', "Auth\AuthController@store");
Route::get('/logout', "Auth\AuthController@destroy")->name('logout');


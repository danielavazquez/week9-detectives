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
    return view('index')->name('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detective/{detective_slug}','DetectiveController@show')->name('show');
Route::get('/detective/index', 'DetectiveController@index')->name('index');

Route::get('/detective/{detective_slug}', 'DetectiveController@store')->name('store');
Route::get('/detective/{detective_slug/crime', 'DetectiveController@create')->name('create');



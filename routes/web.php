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

Route::get('/', 'HomeController@index')->name('home');
Route::get('servicio/{slug}',       'HomeController@servicio')->name('servicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('configs',          'Admin\ConfigController');
Route::resource('infos',            'Admin\InfoController');
Route::resource('servicios',        'Admin\ServicioController');
Route::resource('sliders',          'Admin\SliderController');
Route::resource('logos',            'Admin\LogoController');


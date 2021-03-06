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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
Route::get('/products', 'Product\ProductController@index');
Route::get('/plugins', 'Plugins\PluginsController@index');
//sales
Route::get('/new-sale', 'SaleDocument\SaleDocumentController@index');
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
//Gallery Option
Route::get('/','GalleryController@index');
Route::resource('/gallery','GalleryController');
Route::get('/gallery/show/{id}','GalleryController@show');
Route::get('/gallery/edit/{id}','GalleryController@edit');
Route::post('/gallery/updateData','GalleryController@updateData');
Route::get('/gallery/destroy/{id}','GalleryController@destroy');


//Portfolio Option
Route::resource('/photo','PhotoController');
Route::get('/portfolio/create/{id}','PhotoController@create');
Route::get('/portfolio/details/{id}','PhotoController@details');
Route::get('/portfolio/edit/{id}','PhotoController@edit');
Route::post('/portfolio/updateData','PhotoController@updateData');
Route::get('/portfolio/destroy/{id}/{gallery_id}','PhotoController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

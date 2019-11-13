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

Auth::routes();

Route::get('/', 'TapiocasController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::get('about', 'TapiocasController@about')->name('about.get');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('tapiocas', 'TapiocasController',['only'=>['create','store','show','edit','update','destroy']]);
    Route::get('mytapioca','TapiocasController@mytapioca')->name('tapiocas.mytapioca');
    Route::get('search','TapiocasController@search')->name('tapiocas.search');
   
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    Route::group(['prefix' => 'tapiocas/{id}'], function () {
        Route::post('favorite', 'FavoriteController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoriteController@destroy')->name('favorites.unfavorite');
    });
});
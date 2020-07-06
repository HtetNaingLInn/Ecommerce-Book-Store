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

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');

Route::get('detail/{id}', 'HomeController@detail')->name('detail');
Route::get('category/{id}', 'HomeController@category')->name('search.category');

Route::get('/{id}/cart', 'HomeController@add');
Route::get('/cart', 'HomeController@show');
Route::get('cart/delete/{id}', 'HomeController@cartDelete');

Route::get('check/{id}', 'HomeController@check')->middleware('auth');
Route::post('check/{id}', 'OrderController@store')->middleware('auth');

Route::get('order/{id}', 'OrderController@show')->middleware('auth');

Route::get('order/detail/{id}', 'OrderController@detail')->middleware('auth');

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['can:isAdmin']], function () {

    Route::get('category', 'CategoryController@index');
    Route::get('category/create', 'CategoryController@create');
    Route::post('category/create', 'CategoryController@store');
    Route::get('category/{id}/edit', 'CategoryController@edit');
    Route::post('category/{id}/edit', 'CategoryController@update');
    Route::get('category/{id}/destroy', 'CategoryController@destroy');

    Route::get('book', 'BookController@index');
    Route::get('book/create', 'BookController@create');
    Route::post('book/create', 'BookController@store');
    Route::get('book/{id}/edit', 'BookController@edit');
    Route::post('book/{id}/edit', 'BookController@update');
    Route::get('book/{id}/show', 'BookController@show');
    Route::get('book/{id}/destroy', 'BookController@destroy');
    Route::get('book/category/{id}', 'BookController@category');

    Route::get('user', 'UserController@index');

    Route::get('order', 'OrderController@index');
    Route::get('order/detail/{id}', 'OrderController@detail');

    Route::get('order/edit/{id}', 'OrderController@edit');
    Route::post('order/edit/{id}', 'OrderController@update');

});

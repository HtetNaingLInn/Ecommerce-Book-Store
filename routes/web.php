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

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');

Route::get('detail/{id}', 'HomeController@detail')->name('detail');
Route::get('category/{id}', 'HomeController@category')->name('search.category');

Route::get('/{id}/cart', 'HomeController@add');
Route::get('/cart', 'HomeController@show');
Route::get('cart/delete/{id}', 'HomeController@cartDelete');

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

});

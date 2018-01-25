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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'products'], function(){

   Route::get('/{id?}', [
       'uses' => 'ProductController@index',
       'as' => 'products.index'
   ]);

   Route::post('store', [
       'uses' => 'ProductController@store',
       'as' => 'products.store'
   ]);

   Route::patch('{id}/update', [
       'uses' => 'ProductController@update',
       'as' => 'products.update'
   ]);

   Route::delete('{id}/delete', [
       'uses' => 'ProductController@destroy',
       'as' => 'products.delete'
   ]);
});

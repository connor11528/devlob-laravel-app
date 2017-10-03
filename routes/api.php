<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/{user}', function (App\user $user) {
    return $user->email;
});

Route::post('/connect/shopify', 'ProductController@connect_shopify');
Route::get('/connect/shopify', 'ProductController@connect_shopify');

Route::get('/sync', 'ProductController@sync');

Route::get('/products', 'ProductController@index');

Route::get('/products/{product}', 'ProductController@show');


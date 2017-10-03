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

// https://blog.shameerc.com/2016/08/set-up-oauth2-server-using-laravel-passport
Route::get('/redirect', function () {

    $query = http_build_query([
        'client_id' => '3',
        'redirect_uri' => 'http://localhost/auth/callback',
        'response_type' => 'code',
        'scope' => ''
    ]);

    return redirect('http://server.local/oauth/authorize?'.$query);
});

Route::get('/callback', function (Illuminate\Http\Request $request) {
    $http = new \GuzzleHttp\Client;

    $response = $http->post('http://server.local/oauth/token', [
        'form_params' => [
            'client_id' => '7',
            'client_secret' => 'FRo6gGrcvLOMtoVNuxW0tomTK1gYNLE2tNDW5175',
            'grant_type' => 'authorization_code',
            'redirect_uri' => 'http://localhost/auth/callback',
            'code' => $request->code,
        ],
    ]);
    return json_decode((string) $response->getBody(), true);
});

Route::get('/user/{user}', function (App\user $user) {
    return $user->email;
});

Route::post('/connect/shopify', 'ProductController@connect_shopify');

Route::get('/sync', 'ProductController@sync');

Route::get('/products', 'ProductController@index');

Route::get('/products/{product}', 'ProductController@show');


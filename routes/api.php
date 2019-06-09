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

//User Route token

Route::group(['namespace' => 'API\V1', 'prefix' => 'v1' ,'middleware' => 'auth:api'], function () {

    Route::post('/user/edit', 'UserController@update');
    Route::post('/user/info', 'UserController@info');
    Route::post('/update/verify', 'UserController@verificationUpdate');
    Route::post('/logout', 'UserController@logout');
});
//login and register route

Route::group(['namespace' => 'API\V1', 'prefix' => 'v1'], function () {

    Route::post('/register/verify', 'UserController@verificationRegister');
    Route::post('/register', 'UserController@register');
    Route::post('/login', 'UserController@login');
});

//product Route token
Route::group(['namespace' => 'API\V1', 'prefix' => 'v1' ,'middleware' => 'auth:api'], function () {
    Route::get('/products/{product}', 'ProductController@show');
    Route::post('/products', 'ProductController@store');
    Route::get('/products', 'ProductController@index');
    Route::post('/product/update/{product}', 'ProductController@update');
    Route::post('/product/destroy/{product}', 'ProductController@destroy');

});

//download link for pic
Route::group(['namespace' => 'API\V1', 'prefix' => 'v1' ], function () {

    Route::get('download/{filename}', 'ProductController@Downloadlink');

});


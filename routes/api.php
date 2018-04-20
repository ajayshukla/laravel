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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login', 'ApiloginController@login');

Route::get('/dashboard', 'ApiController@dashboard');

Route::get('/newapp','ApiController@appForm');

Route::get('/add','ApiController@generateKeys');

Route::post('/add','ApiController@generateKeys');

Route::get('/getStandardOffer','ApiController@getStandardOffer');

Route::get('/logout','ApiController@logout');
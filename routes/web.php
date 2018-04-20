<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/admin', 'AdminController@index');
Route::get('/user', 'UserController@index');
Route::get('/offers', 'AdminController@viewOffer');
Route::post('/user/changerole/{id}', 'UserController@changeRole');
Route::get('/user/view/{id}', 'UserController@show');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/update/{id}', 'UserController@update');
Route::get('/user/changepassword/{id}', 'UserController@changepassword');
Route::post('/user/updatepassword/{id}', 'UserController@updatepassword');

Route::get('/ajax', 'StandardofferController@getInterestRate');
Route::post('/ajax', 'StandardofferController@getInterestRate');

Route::get('/ajaxpaidinterest', 'StandardofferController@getPaidInterest');
Route::post('/ajaxpaidinterest', 'StandardofferController@getPaidInterest');

Route::get('/ajaxtotalcost', 'StandardofferController@getTotalCost');
Route::post('/ajaxtotalcost', 'StandardofferController@getTotalCost');

Route::post('standardoffer/filterstandardoffer/', 'StandardofferController@search');
Route::post('promooffer/filterpromooffer/', 'PromoofferController@search');
Route::post('offers/filteroffer/', 'AdminController@search');
Route::post('report/filterreportoffer/', 'ReportController@search');

Route::post('/tenures/savetenures', 'ShareddefinitionController@savetenures');
Route::get('/tenures', 'ShareddefinitionController@tenures');
Route::get('/tenures/create', 'ShareddefinitionController@createtenures');
Route::get('/tenures/edittenures/{id}', 'ShareddefinitionController@edittenures');
Route::post('/tenures/updatetenures/{id}', 'ShareddefinitionController@updatetenures');
Route::delete('tenures/deletetenures/{id}', 'ShareddefinitionController@deletetenures');

Route::resource('report','ReportController');
Route::resource('standardoffer','StandardofferController');
Route::resource('promooffer','PromoofferController');
Route::resource('shareddefinition','ShareddefinitionController');

Route::get('/logout', 'AdminController@logout');

Route::any('/{page?}',function(){
  return View::make('errors.503');
})->where('page','.*');

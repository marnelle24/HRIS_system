<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('holidays', 'HolidayController@index');
Route::group(['prefix' => 'holiday'], function () {
    Route::post('add', 'HolidayController@add');
    Route::get('edit/{id}', 'HolidayController@edit');
    Route::post('update/{id}', 'HolidayController@update');
    Route::delete('delete/{id}', 'HolidayController@delete');
});
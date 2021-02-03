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

Route::get('timesheets', 'TimesheetController@index');
Route::group(['prefix' => 'timesheet'], function () {
    Route::post('add', 'TimesheetController@add');
    Route::get('edit/{id}', 'TimesheetController@edit');
    Route::post('update/{id}', 'TimesheetController@update');
    Route::delete('delete/{id}', 'TimesheetController@delete');
});
Route::get('user', 'UsersController@index');
Route::group(['prefix' => 'users'], function () {
    Route::post('add', 'UsersController@add');
    Route::get('edit/{id}', 'UsersController@edit');
    Route::post('update/{id}', 'UsersController@update');
    Route::delete('delete/{id}', 'UsersController@delete');
});

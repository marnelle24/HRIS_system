<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersInformationController;
use App\Http\Controllers\TabsController;

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

Route::group(['prefix' => 'nav-list'], function () {
    Route::get('list', [TabsController::class,'list']);
});
Route::group(['prefix' => 'users-information'], function () {
    Route::post('add', [UsersInformationController::class,'add']);
    Route::get('list', [UsersInformationController::class,'list']);
    Route::get('edit/{id}',[UsersInformationController::class,'edit']);
    Route::post('update/{id}',[UsersInformationController::class,'update']);
    Route::delete('delete/{id}',[UsersInformationController::class,'delete']);
});

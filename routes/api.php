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

Route::post('/login', 'App\Http\Controllers\LoginController@auth');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('gifts', 'App\Http\Controllers\GiftsController');
    Route::prefix('gifts/{gift}')->group(function () {
        Route::post('redeem', 'App\Http\Controllers\Gifts\RedeemController@redeem');
        Route::post('rating', 'App\Http\Controllers\Gifts\RatingController@rating');
    });
});

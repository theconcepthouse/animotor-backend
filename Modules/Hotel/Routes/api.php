<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Hotel\Http\Controllers\HotelController;

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

Route::middleware('auth:api')->get('/hotel', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/'], function ($router) {

    Route::group(['prefix' => 'config'], function () {
        Route::get('home_data', [HotelController::class, 'getTrendingHotels']);
    });
});

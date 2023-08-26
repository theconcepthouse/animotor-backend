<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Hotel\Http\Controllers\HotelController;

Route::prefix('hotel')->group(function() {

    Route::get('/listing', [HotelController::class,'index'])->name('hotels');


    Route::get('/show/{id}', [HotelController::class,'show'])->name('hotel.show');


});

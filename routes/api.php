<?php

use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\ConfigController;
use App\Http\Controllers\Api\DriverController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/'], function ($router) {

    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('delete/account', [AuthController::class, 'delete']);
        Route::post('register', [AuthController::class, 'register']);

        Route::post('user', [AuthController::class, 'user']);

        Route::post('user/update', [AuthController::class, 'update']);

        Route::post('verify/phone', [AuthController::class, 'verifyPhone']);

        Route::post('forgot/pass', [AuthController::class, 'forgotPass']);
        Route::post('check/phone', [AuthController::class, 'checkPhone']);
        Route::post('forgot/pass/verify', [AuthController::class, 'verifyResetCode']);
        Route::post('reset/pass', [AuthController::class, 'resetPass']);
        Route::post('send/email/verify', [AuthController::class, 'sendVerifyEmail']);
    });


    Route::group(['prefix' => 'driver','middleware' => ['auth:sanctum']], function ($router) {
        Route::post('car/update', [DriverController::class, 'vehicleUpdate']);
        Route::post('update/document', [DriverController::class, 'vehicleUpdateDocument']);
    });

    Route::group(['prefix' => 'config'], function () {
        Route::get('settings', [ConfigController::class, 'getSettings']);
        Route::get('countries', [ConfigController::class, 'getCountries']);
        Route::get('driver/cancellation/reasons', [ConfigController::class, 'getDriversCancellationReasons']);
        Route::get('rider/cancellation/reasons', [ConfigController::class, 'getRidersCancellationReasons']);
        Route::get('regions', [ConfigController::class, 'getRegions']);
        Route::get('vehicle/makes', [ConfigController::class, 'getVehicleMakes']);
        Route::get('vehicle/models/{id}', [ConfigController::class, 'getVehicleModels']);
        Route::get('vehicle/types', [ConfigController::class, 'getVehicleTypes']);

        Route::post('check/firebase', [ConfigController::class, 'checkFB']);
    });

});



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

use Illuminate\Support\Facades\Route;
use Modules\AdvanceRental\Http\Controllers\AdvanceRentalController;
use Modules\AdvanceRental\Http\Controllers\IncidentController;
use Modules\AdvanceRental\Http\Controllers\VehicleDefectController;
use Modules\AdvanceRental\Http\Controllers\VehicleReturnController;

Route::prefix('advancerental')->group(function() {
    Route::get('/', 'AdvanceRentalController@index');

    Route::get('/report-vehicle-defect/{id}', [VehicleDefectController::class,'reportDefect'])->name('rental.report_defect');
    Route::get('/return-vehicle/{id}', [VehicleReturnController::class,'returnVehicle'])->name('return.vehicle');
    Route::get('/return-vehicle/store', [VehicleReturnController::class,'vehicleReturnStore'])->name('vehicle_return.store');
    Route::get('/return-vehicle/car_damage_report/{booking_id}/{car_id}', [VehicleReturnController::class,'vehicleReturnCarDamageReport'])->name('vehicle_return.car_damage_report');
    Route::post('report-vehicle-defect/store', [AdvanceRentalController::class,'store'])->name('rental.report_defect.store');

    Route::get('/report-incident/{id}', [IncidentController::class,'reportIncident'])->name('rental.report_incident');
    Route::post('/report-incident/store', [IncidentController::class,'store'])->name('rental.report_incident.store');

});

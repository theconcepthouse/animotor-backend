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
use Modules\AdvanceRental\Http\Controllers\OthersController;
use Modules\AdvanceRental\Http\Controllers\VehicleDefectController;
use Modules\AdvanceRental\Http\Controllers\VehicleInspectionController;
use Modules\AdvanceRental\Http\Controllers\VehicleReturnController;

Route::prefix('advancerental')->middleware('auth')->group(function() {
    Route::get('/', 'AdvanceRentalController@index');

    Route::get('/report-vehicle-defect/{id}', [VehicleDefectController::class,'reportDefect'])->name('rental.report_defect');
    Route::get('/documents/{id}', [VehicleReturnController::class,'documents'])->name('booking.documents');
    Route::get('/return-vehicle/{id}', [VehicleReturnController::class,'returnVehicle'])->name('return.vehicle');
    Route::post('/return-vehicle/store', [VehicleReturnController::class,'vehicleReturnStore'])->name('vehicle_return.store');
    Route::post('/vehicle-inspection/store', [VehicleInspectionController::class,'store'])->name('vehicle_inspection.store');
    Route::get('/vehicle-inspection/create/{id}', [VehicleInspectionController::class,'create'])->name('vehicle_inspection.create');
    Route::get('/return-vehicle/car_damage_report/{booking_id}/{return_id}', [VehicleReturnController::class,'vehicleReturnCarDamageReport'])->name('vehicle_return.car_damage_report');
    Route::get('/car_damage_report/images/{id}', [VehicleReturnController::class,'vehicleReturnDamageReportImages'])->name('vehicle_return.damage_report_images');
    Route::post('/car_damage_report/store/images', [VehicleReturnController::class,'vehicleReturnDamageReportImageStore'])->name('vehicle_return.damage_report_images.store');
    Route::post('report-vehicle-defect/store', [AdvanceRentalController::class,'store'])->name('rental.report_defect.store');

    Route::get('/report-incident/{id}', [IncidentController::class,'reportIncident'])->name('rental.report_incident');
    Route::post('/report-incident/store', [IncidentController::class,'store'])->name('rental.report_incident.store');

    Route::get('/change-of-address/{bookingId}', [OthersController::class,'changeAddress'])->name('customer.changeAddress');
    Route::post('store/change-of-address/', [OthersController::class,'storeChangeAddress'])->name('storeChangeAddress');
    Route::get('create/mileage/{bookingId}', [OthersController::class,'createMileage'])->name('createMileage');
    Route::post('store/mileage', [OthersController::class,'storeMileage'])->name('storeMileage');
    Route::get('create/monthly/maintenance/{bookingId}', [OthersController::class,'createMM'])->name('createMM');
    Route::post('store/monthly/maintenance/', [OthersController::class,'storeMonthlyMaintenance'])->name('storeMonthlyMaintenance');
    Route::get('create/monthly/repair/{id}/{bookingId}', [OthersController::class,'createMonthlyRepair'])->name('createMonthlyRepair');
    Route::post('store/monthly/repair/', [OthersController::class,'storeMonthlyRepair'])->name('storeMonthlyRepair');


});

Route::prefix('admin/rental')->middleware(['auth', 'role:admin|superadmin|owner|manager'])->group(function() {
    Route::get('/vehicle/defects', [VehicleDefectController::class, 'all'])->name('admin.rental.vehicle_defects');
    Route::get('/vehicle/checks', [VehicleDefectController::class, 'vehicleChecks'])->name('admin.rental.vehicle_checks');
    Route::get('/vehicle/incidents', [IncidentController::class, 'incidents'])->name('admin.rental.vehicle_incidents');
});

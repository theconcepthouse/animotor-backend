<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CancellationReasonController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\ComplaintsController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DriversController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TripRequestController;
use App\Http\Controllers\Admin\UserController;


use App\Http\Controllers\Admin\VehicleMakeController;
use App\Http\Controllers\Admin\VehicleModelController;
use App\Http\Controllers\Admin\VehicleTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['auth','role:admin|superadmin'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/user/admins', [AdminController::class, 'admins'])->name('user.admins');

    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::get('settings/services', [AdminController::class, 'ServicesSettings'])->name('settings.services');
    Route::post('setting/store', [AdminController::class, 'storeSettings'])->name('setting.store');

    Route::get('users', [UserController::class, 'users'])->name('users');
    Route::get('/riders', [UserController::class, 'riders'])->name('riders');


    Route::resource('user', UserController::class);
    Route::get('user/{id}/{status}', [UserController::class, 'updateStatus'])->name('user.update.status');
    Route::resource('roles', RolesController::class);
    Route::resource('vehicle_types', VehicleTypeController::class);
    Route::resource('vehicle_makes', VehicleMakeController::class);
    Route::resource('vehicle_models', VehicleModelController::class);
    Route::resource('countries', CountriesController::class);
    Route::resource('complains', ComplaintsController::class);
    Route::resource('documents', DocumentController::class);

    Route::resource('cars', CarController::class);

    Route::resource('rental', RentalController::class);

    Route::resource('regions', RegionController::class);
    Route::resource('cancellation_reasons', CancellationReasonController::class);

    Route::get('trips/{status}', [TripRequestController::class,'index'])->name('trips.index');
    Route::get('trip/{id}', [TripRequestController::class,'show'])->name('trip.show');
    Route::get('drivers/{status}', [DriversController::class,'index'])->name('drivers.index');
    Route::get('driver/{id}/documents', [DriversController::class,'documents'])->name('driver.documents');
    Route::post('driver/update/document', [DriversController::class,'updateDocument'])->name('driver.document.update');

    Route::resource('services', ServiceController::class);

    Route::get('booking/{status}', [BookingController::class,'index'])->name('bookings.index');
    Route::get('bookings/show/{id}', [BookingController::class,'show'])->name('bookings.show');
    Route::post('bookings/update_status/{id}', [BookingController::class,'updateStatus'])->name('bookings.update_status');


    Route::group(['prefix' => 'api'], function() {
        Route::get('get/models', [VehicleModelController::class,'getByMake'])->name('api.get.models');


    });

});

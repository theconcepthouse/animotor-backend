<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CancellationReasonController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ComplaintsController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DriversController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingsController;
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



Route::group(['middleware' => ['auth','role:admin|superadmin|owner|manager'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('testquery', [AdminController::class, 'testQuery'])->name('test');

    Route::get('/user/admins', [AdminController::class, 'admins'])->name('user.admins');

    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::get('settings/services', [AdminController::class, 'ServicesSettings'])->name('settings.services');
    Route::post('setting/store', [AdminController::class, 'storeSettings'])->name('setting.store');

    Route::get('users', [UserController::class, 'users'])->name('users');
    Route::post('user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('user/restore/delete/{id}', [UserController::class, 'restoreDelete'])->name('user.restore_delete');
    Route::delete('user/force_delete/{id}', [UserController::class, 'forceDelete'])->name('user.force_delete');
    Route::get('user/deleted', [UserController::class, 'deleted'])->name('user.deleted');


    Route::get('/riders', [UserController::class, 'riders'])->name('riders');


    Route::resource('user', UserController::class);
    Route::get('user/{id}/{status}', [UserController::class, 'updateStatus'])->name('user.update.status');
    Route::resource('roles', RolesController::class);
    Route::resource('vehicle_types', VehicleTypeController::class);
    Route::resource('vehicle_makes', VehicleMakeController::class);
    Route::resource('faqs', FaqsController::class);
    Route::resource('vehicle_models', VehicleModelController::class);
    Route::resource('countries', CountriesController::class);
    Route::resource('complains', ComplaintsController::class);
    Route::resource('documents', DocumentController::class);

    Route::resource('cars', CarController::class);
    Route::get('car/{id}/extras', [CarController::class,'extras'])->name('car.extras');


    Route::resource('rental', RentalController::class);

    Route::resource('regions', RegionController::class);
    Route::get('region/all_zones/{id?}', [RegionController::class,'getAllZoneCordinates'])->name('regions.all_coordinates');
    Route::get('region/region/search', [RegionController::class,'search'])->name('regions.search');



    Route::resource('cancellation_reasons', CancellationReasonController::class);

    Route::get('trips/{status}', [TripRequestController::class,'index'])->name('trips.index');
    Route::get('trip/{id}', [TripRequestController::class,'show'])->name('trip.show');
    Route::get('trip/delete/{id}', [TripRequestController::class,'deleteTrip'])->name('trip.delete');
    Route::get('drivers/{status}', [DriversController::class,'index'])->name('drivers.index');
    Route::get('drivers', [DriversController::class,'all'])->name('drivers');
    Route::get('driver/{id}/documents', [DriversController::class,'documents'])->name('driver.documents');
    Route::post('driver/update/document', [DriversController::class,'updateDocument'])->name('driver.document.update');

    Route::resource('currencies', CurrencyController::class);
    Route::resource('menus', MenuController::class)->only('store','update');
    Route::resource('menu_items', MenuItemController::class)->except('index');
    Route::post('menu/delete', [MenuController::class,'delete'])->name('menus.delete');
    Route::post('currency/delete/all', [CurrencyController::class,'deleteAll'])->name('currencies.delete_all');
    Route::resource('services', ServiceController::class);
    Route::resource('companies', CompanyController::class);

    Route::get('bookings', [BookingController::class,'index'])->name('bookings.index');
    Route::get('bookings/show/{id}', [BookingController::class,'show'])->name('bookings.show');
    Route::post('bookings/update_status', [BookingController::class,'updateStatus'])->name('bookings.update_status');
    Route::post('bookings/confirm/{id}', [BookingController::class,'confirmBooking'])->name('bookings.confirm');

    Route::put('/api/toggle/{modelId}', [SettingsController::class, 'toggle']);



    Route::group(['prefix' => 'settings'], function() {
        Route::any('pages', [SettingsController::class, 'pages'])->name('setting.pages');
        Route::get('page/builder/{id}', [SettingsController::class, 'pageBuilder'])->name('setting.page.builder');
        Route::post('page/content/store', [SettingsController::class, 'pageContentStore'])->name('setting.page.content.store');
        Route::post('page/content/update', [SettingsController::class, 'pageContentUpdate'])->name('setting.page.content.update');
        Route::get('components', [SettingsController::class, 'components'])->name('setting.components');
        Route::get('component/all_blocks', [SettingsController::class, 'allBlocks'])->name('setting.all_blocks');
        Route::get('page/edit/{id}', [SettingsController::class, 'editPage'])->name('setting.page.edit');
        Route::get('component/edit/{id}', [SettingsController::class, 'editComponents'])->name('setting.component.edit');
        Route::get('component/duplicate/{id}', [SettingsController::class, 'duplicateComponent'])->name('setting.component.duplicate');
        Route::get('component/delete/{id}', [SettingsController::class, 'deleteComponent'])->name('setting.component.delete');
        Route::get('toggle/theme', [SettingsController::class, 'toggleTheme'])->name('settings.toggle_theme');
        Route::get('theme', [SettingsController::class, 'themeSetting'])->name('settings.theme');
        Route::get('css', [SettingsController::class, 'cssEditor'])->name('settings.css');
        Route::any('head/foot', [SettingsController::class, 'headFoot'])->name('settings.head_foot');
        Route::any('menu/setup', [SettingsController::class, 'menuSetup'])->name('settings.menu_setup');
        Route::post('css/store', [SettingsController::class, 'cssEditorSave'])->name('settings.css.store');

        Route::post('editor/save', [SettingsController::class, 'saveContent'])->name('setting.editor.store');
        Route::post('component/store', [SettingsController::class, 'saveComponent'])->name('setting.component.store');

        Route::post('permission/store', [RolesController::class, 'storePermission'])->name('permission.store');
        Route::post('permission/update/{id}', [RolesController::class, 'updatePermission'])->name('permission.update');



        Route::delete('/pages/{id}', [SettingsController::class, 'destroyPage'])->name('setting.page.destroy');
        Route::delete('/page/content/{id}', [SettingsController::class, 'destroyPageContent'])->name('setting.page.content.destroy');

    });


    Route::group(['prefix' => 'api'], function() {
        Route::get('get/models', [VehicleModelController::class,'getByMake'])->name('api.get.models');


    });

});

Route::get('p/{id}', [SettingsController::class, 'pageBuilder'])->name('admin.setting.page.builder');

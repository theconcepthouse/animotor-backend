<?php


use App\Http\Controllers\Admin\AdminController;
//use App\Http\Controllers\Admin\Appointment;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CancellationReasonController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ComplaintsController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DriverPcnController;
use App\Http\Controllers\Admin\DriversController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\FleetEventController;
use App\Http\Controllers\Admin\FleetPlanningController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\MailTrackerController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PCNController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\ReportIncidentController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TripRequestController;
use App\Http\Controllers\Admin\UserController;


use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\VehicleMakeController;
use App\Http\Controllers\Admin\VehicleModelController;
use App\Http\Controllers\Admin\VehicleTypeController;
use App\Http\Controllers\Admin\WorkshopController;
use Illuminate\Support\Facades\Route;
use Modules\AdvanceRental\Http\Controllers\IncidentController;

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
    Route::get('backup-manager', [AdminController::class, 'backupManager'])->name('backup-manager')->middleware('surd_core');

    Route::get('testquery', [AdminController::class, 'testQuery'])->name('test');
    Route::get('activity/logs', [AdminController::class, 'activityLog'])->name('activity.log');

    Route::get('/user/admins', [AdminController::class, 'admins'])->name('user.admins');
    Route::get('/create/admin', [AdminController::class, 'createAdmin'])->name('createAdmin');
    Route::post('/store/admin', [AdminController::class, 'storeAdmin'])->name('storeAdmin');

    Route::get('settings', [AdminController::class, 'settings'])->name('settings')->middleware('surd_core');
    Route::get('settings/services', [AdminController::class, 'ServicesSettings'])->name('settings.services');
    Route::post('setting/store', [AdminController::class, 'storeSettings'])->name('setting.store');

    Route::get('users', [UserController::class, 'users'])->name('users');
    Route::post('user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('user/restore/delete/{id}', [UserController::class, 'restoreDelete'])->name('user.restore_delete');
    Route::delete('user/force_delete/{id}', [UserController::class, 'forceDelete'])->name('user.force_delete');
    Route::get('user/deleted', [UserController::class, 'deleted'])->name('user.deleted');
    Route::get('send/notification', [UserController::class, 'sendNotification'])->name('send.notification');
    Route::get('/riders', [UserController::class, 'riders'])->name('riders');


    Route::resource('user', UserController::class);
    Route::get('user/{id}/{status}', [UserController::class, 'updateStatus'])->name('user.update.status');
    Route::resource('roles', RolesController::class);
    Route::resource('vehicle_types', VehicleTypeController::class);
    Route::resource('vehicle_makes', VehicleMakeController::class);
    Route::resource('faqs', FaqsController::class)->middleware('surd_core');;
    Route::resource('vehicle_models', VehicleModelController::class);
    Route::resource('countries', CountriesController::class);
    Route::resource('complains', ComplaintsController::class);
    Route::resource('documents', DocumentController::class);

    Route::resource('cars', CarController::class);
    Route::get('car/{id}/extras', [CarController::class,'extras'])->name('car.extras');


    Route::resource('rental', RentalController::class);

    Route::resource('regions', RegionController::class);
    Route::get('region/{id}/airports', [RegionController::class,'airports'])->name('regions.airports');
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

    Route::get('create/driver', [DriversController::class, 'createDriver'])->name('create.customer');
    Route::post('store/driver', [DriversController::class, 'storeDriver'])->name('store.driver');
    Route::get('create/driver/on-boarding', [DriversController::class, 'createOnBoarding'])->name('createOnBoarding');
    Route::get('add/driver', [DriversController::class, 'addDriver'])->name('addDriver');

    Route::get('add/document/{userId}', [DriversController::class, 'addDocument'])->name('addDocument');
    Route::post('add/new/document/', [DriversController::class, 'addNewDoc'])->name('addNewDoc');
    Route::post('store/document/', [DriversController::class, 'storeDocument'])->name('storeDocument');
    Route::get('/driver/{driverId}/history', [DriversController::class, 'history'])->name('history');
    Route::get('/driver/{driverId}/history/{id}', [DriversController::class, 'viewHistory'])->name('viewHistory');

    Route::get('driver/note/{driverId}', [NoteController::class, 'notes'])->name('notes');
    Route::get('driver/note/chat/{driverId}', [NoteController::class, 'noteChat'])->name('noteChat');
    Route::get('driver/{driverId}/note/{noteId}', [NoteController::class, 'viewNote'])->name('viewNote');
    Route::post('save/driver/note', [NoteController::class, 'saveNoteChat'])->name('saveNoteChat');
    Route::delete('delete/driver/note/{noteId}', [NoteController::class, 'deleteNoteChat'])->name('deleteNoteChat');

    Route::get('pcns/driver/{driverId}', [DriverPcnController::class, 'driverPcn'])->name('driverPcn');
    Route::get('add/pnc/driver/{driverId}', [DriverPcnController::class, 'addDriverPcn'])->name('addDriverPcn');
    Route::post('store/pnc/driver/{driverId}', [DriverPcnController::class, 'storeDriverPcn'])->name('storeDriverPcn');
    Route::get('add/pcn-log/{pcnId}/driver/{driverId}', [DriverPcnController::class, 'addPcnLog'])->name('addPcnLog');
    Route::post('store/pcn-log/driver/{driverId}', [DriverPcnController::class, 'storePcnLog'])->name('storePcnLog');
    Route::delete('delete/pcn-log/{pcnId}', [DriverPcnController::class, 'deleteDriverPcn'])->name('deleteDriverPcn');

    Route::get('payment/history/{driverId}', [PaymentController::class, 'paymentHistory'])->name('paymentHistory');
    Route::post('store/driver/payment', [PaymentController::class, 'savePayment'])->name('savePayment');
    Route::post('store/payment/item', [PaymentController::class, 'addPaymentItem'])->name('addPaymentItem');

    Route::get('driver/{driverId}/forms/', [FormController::class, 'index'])->name('form.index');
    Route::get('/user/{driverId}/form/{formId}', [FormController::class, 'fetchCustomerForm'])->name('fetchCustomerForm');
    Route::post('/submit/customer/form/', [FormController::class, 'submitForm'])->name('submitForm');
    Route::get('/generate-pdf/{formId}/{driverId}', [FormController::class, 'generatePDF'])->name('generatePDF');

    Route::get('vehicle', [VehicleController::class, 'index'])->name('vehicle.index');

    Route::get('fleet/plans', [FleetPlanningController::class, 'index'])->name('fleet.index');
    Route::post('store/plan', [FleetPlanningController::class, 'store'])->name('fleet.store');
    Route::delete('/delete-event/{id}', [FleetPlanningController::class, 'destroy']);

    Route::get('fleet/events', [FleetEventController::class, 'index'])->name('fleetEvent');
    Route::post('store/fleet/event', [FleetEventController::class, 'store'])->name('storeFleetEvent');
    Route::put('fleet/events/{id}', [FleetEventController::class, 'update']);
    Route::delete('fleet/events/{id}', [FleetEventController::class, 'destroy']);

    Route::get('reported/incidents', [ReportIncidentController::class, 'index'])->name('incident.index');
    Route::get('add/claim', [ReportIncidentController::class, 'addClaim'])->name('addClaim');
    Route::get('edit/claim/{claimId}', [ReportIncidentController::class, 'editClaim'])->name('editClaim');
    Route::post('update/claim-status/{claimId}', [ReportIncidentController::class, 'updateClaimStatus'])->name('updateClaimStatus');

    Route::get('workshop', [WorkshopController::class, 'index'])->name('workshop.index');
    Route::get('create/workshop', [WorkshopController::class, 'create'])->name('workshop.create');
    Route::get('edit/workshop/{workshopId}', [WorkshopController::class, 'edit'])->name('workshop.edit');
    Route::patch('update/workshop/{workshopId}', [WorkshopController::class, 'update'])->name('workshop.update');
    Route::delete('destroy/workshop/{workshopId}', [WorkshopController::class, 'destroy'])->name('workshop.destroy');

    Route::get('messages', [MessageController::class, 'index'])->name('message.index');
    Route::post('send/message', [MessageController::class, 'store'])->name('message.store');
    Route::get('sent/messages', [MessageController::class, 'sent'])->name('message.sent');
    Route::get('show/message/{id}', [MessageController::class, 'show'])->name('message.show');

    Route::get('mail-tracker', [MailTrackerController::class, 'index'])->name('mailTracker.index');
    Route::get('create/mail-tracker', [MailTrackerController::class, 'create'])->name('mailTracker.create');
    Route::get('edit/mail-tracker/{id}', [MailTrackerController::class, 'edit'])->name('mailTracker.edit');
    Route::delete('destroy/mail-tracker/{id}', [MailTrackerController::class, 'destroy'])->name('mailTracker.destroy');

});

Route::get('p/{id}', [SettingsController::class, 'pageBuilder'])->name('admin.setting.page.builder');
Route::any('p/store/check', [AdminController::class, 'ddA']);

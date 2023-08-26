<?php


use App\Http\Controllers\Admin\Addons\PcnController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth','role:admin|superadmin|owner|manager'], 'prefix' => 'admin', 'as' => 'admin.'], function() {

    Route::resource('pcn', PcnController::class);
    Route::get('car/pcn/{id}', [PcnController::class,'carPCNs'])->name('admin.pcn.car');

});

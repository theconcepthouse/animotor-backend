<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\Payment\FlutterwavePaymentController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Payment\PaystackPaymentController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [FrontPageController::class,'home']);

Route::get('/{slug}', [FrontPageController::class,'page'])->name('page.show');


Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
});

//Route::get('/make/admin', [App\Http\Controllers\HomeController::class, 'makeAdmin']);


include 'admin.php';

Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::group(['prefix' => 'payment'], function(){
    Route::any('/{gateway}/pay', [PaymentController::class,'payment_initialize']);

    Route::any('/success', [PaymentController::class,'paymentDone'])->name('payment.success');

    Route::any('/failed', [PaymentController::class,'paymentFailed'])->name('payment.failed');
});

Route::any('/paystack/callback', [PaystackPaymentController::class, 'callback']);
Route::any('/flutterwave/payment/callback', [FlutterwavePaymentController::class, 'callback']);

<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DashboardController;
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

Auth::routes();

Route::get('/', [FrontPageController::class,'home']);
Route::get('/manage/booking', [FrontPageController::class,'manageBooking'])->name('manage_booking');
Route::post('/search/booking', [FrontPageController::class,'searchBooking'])->name('search_booking');
Route::get('/builder', [FrontPageController::class,'builder']);
Route::get('/booking/{id}', [FrontPageController::class,'booking'])->name('booking');
Route::get('/voucher/{id}', [FrontPageController::class,'voucher'])->name('voucher');
Route::get('/builder2', [FrontPageController::class,'builder2']);
Route::get('/list', [FrontPageController::class,'list']);
Route::get('/flight', [FrontPageController::class,'flight']);
Route::get('/deal', [FrontPageController::class,'deal'])->name('deal');
Route::get('/protection_option', [FrontPageController::class,'protectionOption'])->name('protection');
Route::get('/checkout', [FrontPageController::class,'checkout'])->name('checkout');


Route::get('/search', [FrontPageController::class,'search'])->name('search');


Route::group(['prefix' => 'customer'], function(){
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/return', [DashboardController::class,'return'])->name('return');

});



Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
});

Route::get('/{slug}', [FrontPageController::class,'page'])->name('page.show');



//Route::get('/make/admin', [App\Http\Controllers\HomeController::class, 'makeAdmin']);


include 'admin.php';
include 'addons.php';


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

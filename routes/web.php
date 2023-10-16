<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\Payment\FlutterwavePaymentController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Payment\PaystackPaymentController;
use App\Http\Controllers\Payment\StripeController;
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

Route::group(['middleware' => ['auto_login']], function () {
    Route::get('/', [FrontPageController::class, 'home']);
    Route::get('/token', [FrontPageController::class, 'token']);
    Route::get('/manage/booking', [FrontPageController::class, 'manageBooking'])->name('manage_booking');
    Route::post('/search/booking', [FrontPageController::class, 'searchBooking'])->name('search_booking');
    Route::get('/builder', [FrontPageController::class, 'builder']);
    Route::get('/booking/{id}', [FrontPageController::class, 'booking'])->name('booking');
    Route::get('/booking_successful/{id}', [FrontPageController::class, 'booking'])->name('booking_successful');
    Route::get('/voucher/{id}', [FrontPageController::class, 'voucher'])->name('voucher');
    Route::get('/builder2', [FrontPageController::class, 'builder2']);
    Route::get('/list', [FrontPageController::class, 'list']);
    Route::get('/flight', [FrontPageController::class, 'flight']);
    Route::get('/deal', [FrontPageController::class, 'deal'])->name('deal');
    Route::get('/protection_option', [FrontPageController::class, 'protectionOption'])->name('protection');
    Route::get('/booking/select_payment/{id}', [FrontPageController::class, 'select_payment_method'])->name('select_payment');
    Route::get('/payment/process', [FrontPageController::class, 'paymentProcess'])->name('payment.process');
    Route::get('/checkout', [FrontPageController::class, 'checkout'])->name('checkout');
});

Route::get('/search', [FrontPageController::class, 'search'])->name('search');


Route::group(['middleware' => ['auto_login_required']], function () {
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/bookings', [DashboardController::class, 'bookings'])->name('bookings');
        Route::get('/booking/view/{id}', [DashboardController::class, 'bookingView'])->name('booking.view');
        Route::get('/return', [DashboardController::class, 'return'])->name('return');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
        Route::get('/notifications', [DashboardController::class, 'notifications'])->name('notifications');
        Route::get('/transactions', [DashboardController::class, 'transactions'])->name('transactions');
        Route::get('/top_up', [DashboardController::class, 'topUp'])->name('top_up');

        Route::post('/payment', [PaymentController::class, 'payment_initialize'])->name('payment.init');
    });
});


Route::get('/home', function () {
    return redirect()->route('dashboard');
});
Route::get('test/email', function () {
    return view('emails.account_notify');
});

Route::get('/{slug}', [FrontPageController::class, 'page'])->name('page.show');


//Route::get('/make/admin', [App\Http\Controllers\HomeController::class, 'makeAdmin']);


include 'admin.php';
include 'addons.php';


//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::group(['prefix' => 'payment'], function () {
    Route::any('/{gateway}/pay', [PaymentController::class, 'payment_initialize']);

    Route::any('/success', [PaymentController::class, 'paymentDone'])->name('payment.success');

    Route::any('/failed', [PaymentController::class, 'paymentFailed'])->name('payment.failed');
});


Route::any('/paystack/callback', [PaystackPaymentController::class, 'callback']);
Route::any('/flutterwave/payment/callback', [FlutterwavePaymentController::class, 'callback']);

Route::post('/monify/webhook', [UserController::class, 'webhook'])->name('monify.webhook');


//Stipe Start
Route::controller(StripeController::class)->group(function () {
    Route::get('stripe', 'stripe');
    Route::post('/stripe/create-checkout-session', 'create_checkout_session')->name('stripe.get_token');
    Route::any('/stripe/payment/callback', 'callback')->name('stripe.callback');
    Route::get('/stripe/success', 'success')->name('stripe.success');
    Route::get('/stripe/cancel', 'cancel')->name('stripe.cancel');
});
//Stripe END

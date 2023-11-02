<?php

use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Frontend\Account\Auth\AuthController;
use App\Http\Controllers\Frontend\Account\Auth\RegisterController;

Route::group([
    'prefix' => 'account'
], function () {
    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);
     
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    })->middleware('guest')->name('account.reset-password.email');

    Route::post('login', [AuthController::class, 'login'])->name('account.login.post');
    Route::get('login-out', [AuthController::class, 'logout'])->name('account.login-out.get');
    Route::post('register', [RegisterController::class, 'register'])->name('account.signup.post');

    Route::group([
        'middleware' => ['auth:account']
    ], function () {
        Route::group(['middleware' => 'account_verify'], function() {
            Route::get('confirm-sign-up', [RegisterController::class, 'confirmSignUp'])->name('account.sign-up.confirm');
            
            /**
             * personal account
             */
            Route::get('personal-quotes', [RegisterController::class, 'personalQuotes'])->name('account.personal.quotes');
            Route::get('personal-agreement', [RegisterController::class, 'personalAgreement'])->name('account.personal.agreement');
            Route::get('pick-up-information', [RegisterController::class, 'pickUpInformation'])->name('account.pickup.information');
            Route::get('delivery-information', [RegisterController::class, 'deliveryInformation'])->name('account.delivery.information');
            Route::post('personal-bind-quote', [RegisterController::class, 'bindQuote'])->name('account.personal.bind-quote');
            Route::post('personal-check-agreement', [RegisterController::class, 'checkPersonalAgreement'])->name('account.personal.check-agreement');
            /**
             * business account
             */
            Route::get('biz-company-profile', [RegisterController::class, 'bizCompanyProfile'])->name('account.biz.company-profile');
            Route::post('biz-company-profile-store', [RegisterController::class, 'storeBizCompanyProfile'])->name('account.biz.company-profile-store');
            Route::get('biz-agreement', [RegisterController::class, 'bizAgreement'])->name('account.biz.agreement');
            Route::post('biz-check-agreement', [RegisterController::class, 'checkBizAgreement'])->name('account.biz.check-agreement');
            Route::get('biz-billing', [RegisterController::class, 'bizBilling'])->name('account.biz.billing');
            Route::post('biz-billing-store', [RegisterController::class, 'storeBizBilling'])->name('account.biz.billing-store');
            /**
             * 
             */
            Route::get('carrier-company-profile', [RegisterController::class, 'carrierCompanyProfile'])->name('account.carrier.company-profile');
            Route::post('carrier-company-profile-store', [RegisterController::class, 'storeCarrierCompanyProfile'])->name('account.carrier.company-profile-store');
            Route::get('carrier-agreement', [RegisterController::class, 'carrierAgreement'])->name('account.carrier.agreement');
            Route::post('carrier-submit-agreement', [RegisterController::class, 'carrierSubmitAgreement'])->name('account.carrier.submit-agreement');
            Route::post('carrier-skip-agreement', [RegisterController::class, 'skipAgreement'])->name('account.carrier.skip-agreement');
            Route::get('carrier-load', [RegisterController::class, 'carrierLoad'])->name('account.carrier.load');
            Route::post('carrier-submit-load', [RegisterController::class, 'carrierSubmitLoad'])->name('account.carrier.submit-load');
            Route::get('carrier-payment', [RegisterController::class, 'carrierPayment'])->name('account.carrier.payment');
            Route::post('carrier-submit-payment', [RegisterController::class, 'carrierSubmitPayment'])->name('account.carrier.submit-payment');

        });
    });
});

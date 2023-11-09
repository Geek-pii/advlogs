<?php

use App\Helper\Helper;
use App\Models\Account;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\PhoneValidationHistory;

Route::get('user/validate-phone-number', function() {
    $mobileNumber = request()->get('mobile_number', null);
    $companyMobileNumber = request()->get('company_telephone', null);
    $primaryContactNumber = request()->get('primary_contact_number', null);
    $businessPhoneNumber = request()->get('business_phone_number', null);
    $carrierCertificateFax = request()->get('carrier_certificate_fax', null);
    $number = $mobileNumber ?? $primaryContactNumber ?? $businessPhoneNumber ?? $carrierCertificateFax ?? $companyMobileNumber;
    if (!$number) {
        return response()->json([], 400);
    }
    if ($mobileNumber) {
        $type = 'mobile_number';
    } else {
        $type = 'contact_phone_number';
    }
    $number = is_array($number) ? array_pop($number) : $number;
    $apiResult = PhoneValidationHistory::where('phone_number', $number)->where('type', $type)->first();
    if ($apiResult) {
        return response()->json($apiResult->api_result, 200);
    }
    $acceptType = request()->get('accept');
    $apiResult = Helper::twilioValidPhoneNumber($number, $acceptType);
    $phoneValidationHistory = new PhoneValidationHistory();
    $phoneValidationHistory->fill([
        'phone_number' => $number,
        'type' => $type,
        'api_result' => $apiResult
    ])->save();
    return response()->json($apiResult, 200);
})->name('user.validate-phone-number');

Route::get('tools/validation-phone-or-email', [\App\Http\Controllers\Frontend\ToolsController::class, 'validatePhoneOrEmail'])->name('tools.validation-phone-or-email');

Route::get('user/retrieve-verification-code', function() {
    if (auth('account')->check()) {
        $mobile = auth('account')->user()->mobile_number;
    } else {
        $mobile = request()->get('mobile', null);
    }
    if (!$mobile) {
        return response()->json([], 400);
    }
    $mobile = str_replace([' ', '(', ')', '-'], '', $mobile);
    
    $code = random_int(100000, 999999);
    $cacheKey = 'sign_up_verify_code_' . $mobile;
    if (cache()->has('sign_up_verify_code_' . $mobile)) {
        cache()->forget($cacheKey);                
    }
    
    cache()->put('sign_up_verify_code_' . $mobile, $code, 300);
    Helper::smsVerificationCode($mobile, $code);
    \Log::info('retrieve verification code:'. $mobile . '|' .$code);
})->name('user.retrieve-verification-code.post');

Route::get('user/account-exist', function() {
    $mobile = request()->get('mobile_number', null);
    $email = request()->get('email', null);
    if ($mobile && $email) {
        $account = Account::where('email', $email)->where('mobile_number', $mobile)->first();
        $valid = !($account ? true : false);
        return response()->json($valid, 200);
    } else {
        return response()->json([], 422);
    }
})->name('user.account.exist');

Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
    Route::group(['middleware' => ['auth:account', 'account_verify']], function() {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    });

    Route::group(['middleware' => 'auth:account'], function() {
        Route::resource('pick-up-information', PickUpInfoController::class)->only('store', 'update');
        Route::resource('delivery-information', DeliveryInfoController::class)->only('store', 'update');
        Route::get('search-carrier', 'FMCSAController@searchCarrier')->name('fmcsa.carrier.search');
        Route::get('show-carrier/{dotNumber}', 'FMCSAController@showCarrier')->name('fmcsa.carrier.show');
        Route::post('join-company', 'AccountController@joinCompany')->name('account.bind-company');
    });
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localizationRedirect'
        ]
    ],
    function () {
        Route::get('/', 'PageController@index')->name('page.home');

        Route::post('contact', 'ContactController@contact_form')->name('contact.post');

        Route::post('get-a-quote', 'GetAQuoteController@getAQuote')->name('get.a.quote.post');

        Route::get('{slug}', 'PageController@show')->name('page.show')->where('slug', '(.*)?');

        Route::get('business-client','PageController@business');
        Route::get('carrier','PageController@carrier');
        Route::get('personal-vehicles','PageController@vehicle');
        Route::post('logistics','PageController@logistics');
        // Route::get('cont',[PageController::class, 'cont']);
        Route::get('contact-us', 'ContactController@contact');
        Route::get('tooltip','InfoController@tooltip_menu');
    }
);

if (config('app.env') == 'production') {
    URL::forceScheme('https');
}

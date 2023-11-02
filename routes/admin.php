<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

// use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        // 'prefix' => LaravelLocalization::setLocale(),
        // 'middleware' => ['localizationRedirect']
    ],
    function () {
        Route::group(
            [
                "prefix" => "admin",
                "as" => "admin."
            ],
            function () {
                Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
                Auth::routes();


                Route::group(
                    [
                        'middleware' => [
                            'adminAuth',
                            "permission:admin.index"
                        ]
                    ],
                    function () {
                        Route::get('success-message','GetAQuoteController@success_message');
                        Route::get('message/edit/{id}','GetAQuoteController@edit_message');
                        Route::put('message/update/{id}','GetAQuoteController@update_message');
                        // Info Routes
                        Route::get('info','GetAQuoteController@info');
                        Route::get('info/edit/{id}','GetAQuoteController@edit_info');
                        Route::put('info/update/{id}','GetAQuoteController@update_info');

                        Route::get('/', 'DashboardController@index')->name("dashboard.index")->middleware("permission:admin.index");

                        resourceAdmin('users', 'UserController', 'user');
                        
                        resourceAdmin('account', 'AccountController', 'account');
                        Route::post('account/{account}/approval', 'AccountController@approveUser')->name('account.approval')->middleware("permission:admin.account.edit");
                        Route::post('account/{account}/un-approval', 'AccountController@unApprovalUser')->name('account.un-approval')->middleware("permission:admin.account.edit");
                        Route::resource('carrier-load', 'CarrierLoadController')->middleware("permission:admin.carrier.load.index");
                        Route::get('carrier-load.datatable', "CarrierLoadController@datatable")->name("carrier-load.datatable")->middleware("permission:admin.carrier.load.index");


                        resourceAdmin('company', 'CompanyController', 'company');
                        Route::resource('company.carrier-load', 'CompanyCarrierLoadController')->middleware("permission:admin.carrier.load.index");
                        Route::resource('company.payment', 'CompanyPaymentController')->middleware("permission:admin.carrier.payment.index");

                        Route::get('company/{company}/payment-plan', 'CompanyController@paymentPlans')->name('company.payment-plans')->middleware("permission:company.edit");
                        resourceAdmin('roles', 'RoleController', 'role');

                        resourceAdmin('system', 'SystemController', 'system', 'system', ['show', 'index', 'create', 'destroy']);

                        resourceAdmin('themes', 'ThemeController', 'theme');

                        resourceAdmin('menu', 'MenuController', 'menu');

                        resourceAdmin('menu-item', 'MenuItemController', 'menu.item');
                        Route::get('get-theme', 'MenuItemController@getTheme')->name('get.theme');
                        Route::post('menu-item-sort', 'MenuItemController@sort')->name('menu.item.sort');

                        Route::get('pages/create/load-block', 'PageController@loadBlock')->name("page.load.block")->middleware("permission:admin.page.create", 'permission:admin.page.edit');

                        resourceAdmin('pages', 'PageController', 'page');
                        Route::post('pages/delete-multi', 'PageController@deleteMulti')->name('page.multi.delete')->middleware("permission:admin.page.multi.delete");

                        resourceAdmin('faq-category', 'FaqCategoryController', 'faq.category');

                        resourceAdmin('faqs', 'FaqController', 'faq');

                        resourceAdmin('get-a-quote', 'GetAQuoteController', 'get.a.quote');

                        resourceAdmin('contact', 'ContactController', 'contact');

                        resourceAdmin('department', 'DepartmentController', 'department');

                        resourceAdmin('payment-plan', 'PaymentPlanController', 'payment.plan');
                    });
            });
    }
);

if (config('app.env') == 'production') {
    URL::forceScheme('https');
}

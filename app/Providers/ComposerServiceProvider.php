<?php

namespace App\Providers;

use App\Models\System;
use App\Models\MenuItem;
use App\Models\Amphures;
use App\Models\Districts;
use App\Models\Provinces;
use App\Models\Geographies;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $locales = LaravelLocalization::getSupportedLocales();
            $view->with('composer_locales', $locales);
            $view->with('composer_locale', app()->getLocale());
        });

        View::composer([
            'layouts.header',
            'layouts.footer',
            'auth'
        ], function ($view) {
            $system_array = Cache::rememberForever('system_array', function () {
                $arr = [];
                $system = System::query()->select('key', 'content')->get();
                foreach ($system as $sys) {
                    $arr[$sys->key] = $sys->content;
                }
                return $arr;
            });

            $view->with('composer_system', $system_array);
        });

        View::composer(['layouts.header'], function ($view) {
            $menu_header = Cache::rememberForever('menu_header', function () {
                return MenuItem::tree(0, 'header');
            });
            $view->with('menu_header', $menu_header);
        });

        View::composer(['layouts.footer'], function ($view) {
            $menu_footer = Cache::rememberForever('menu_footer', function () {
                return MenuItem::tree(0, 'footer');
            });
            $view->with('menu_footer', $menu_footer);
        });
        // Admin permission
        View::composer([
            'admin.layouts.parts.left_sidebar',
            'admin.dashboard.index',
        ], function ($view) {
            $auth = auth()->user();
            $value = [];
            if ($auth) {
                $value = $auth->getPermissions()->pluck('slug')->toArray();
            }

            $view->with('composer_auth_permissions', $value);
        });
    }

    public function register()
    {
        //
    }
}

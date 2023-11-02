<?php

namespace App\Helper;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TranslateUrl
{
    public static $locales = [];

    public static function add($locale, $transKeyNames, $attributes = [], array $option = [])
    {
        $link = LaravelLocalization::getURLFromRouteNameTranslated($locale, $transKeyNames, $attributes);

        if (!empty($option)) {
            $link = $link . '?' . http_build_query($option);
        }
        self::$locales[$locale] = $link;
    }

    public static function addWithLink($locale, $link)
    {
        self::$locales[$locale] = $link;
    }
}

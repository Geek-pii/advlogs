<?php

namespace App\Helper;

class Breadcrumb
{
    public static $breadcrumb = [];

    public static $page_title = null;

    public static $page_description = null;

    public static function add($name, $link = null, $home = true)
    {
        if ($home && !count(self::$breadcrumb)) {
            $locale = app()->getLocale();
            self::add(trans('client.homepage'), "/{$locale}", false);
        }
        self::$breadcrumb[] = [
            'name' => $name,
            'link' => $link
        ];
    }

    public static function title($name, $description = null)
    {
        self::$page_title = $name;
        self::$page_description = $description;
    }

    public static function out()
    {

        $string = '<div class="content-header"><div class="container-fluid"><div class="row mb-2">';
        if (self::$page_title) {
            $string = '<div class="col-sm-6"><h1 class="m-0">'.self::$page_title.'</h1></div>';
        }
        if (self::$breadcrumb) {
            $string .= '<div class="col-sm-6"><ol class="breadcrumb float-sm-right">';
            foreach (self::$breadcrumb as $name => $link) {
                if ($link !== null) {
                    $string .= '<li class="breadcrumb-item"><a href="' . $link . '">' . $name . '</a></li>';
                } else {
                    $string .= '<li class="breadcrumb-item active">' . $name . '</li>';
                }
            }
            $string .= '</ol></div>';
        }
        $string .= '</div></div></div>';

        return $string;
    }

    public static function output($view = 'frontend.layouts.partials.breadcrumb-2')
    {
        $breadcrumbs = self::$breadcrumb;
        return view($view, compact('breadcrumbs'))->render();
    }
}

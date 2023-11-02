<?php

use App\Models\Page;
use App\Models\MenuItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/**
 * @param string $message
 * @param array $result
 * @param int $code
 * @return JsonResponse
 */
function restSuccess(string $message = "Success", array $result = [], int $code = 200): JsonResponse
{
    $arr = [
        "status" => true,
        "status_code" => $code,
        "message" => $message,
    ];
    if (!empty($result)) {
        $arr["result"] = $result;
    }
    return response()->json($arr, $code);
}

/**
 * @param string $message
 * @param int $code
 * @param array $errors
 * @return JsonResponse
 */
function restFail(string $message = "Error", int $code = 422, array $errors = []): JsonResponse
{
    $arr = [
        "status" => false,
        "status_code" => $code,
        "message" => $message
    ];
    if (!empty($errors)) {
        $arr["errors"] = $errors;
    }
    return response()->json($arr, $code);
}

/**
 * @param $url
 * @param string $class
 * @return string
 */
function currentPageActive($url, string $class = "active"): string
{
    if (!is_array($url)) {
        $check = request()->is($url);
        return $check ? $class : "";
    } else {
        foreach ($url as $value) {
            if (request()->is($value)) {
                return $class;
            }
        }
    }
    return "";
}
function currentMenuPageOpen($url, string $class = "menu-is-opening menu-open"): string
{
    if (!is_array($url)) {
        $check = request()->is($url);
        return $check ? $class : "";
    } else {
        foreach ($url as $value) {
            if (request()->is($value)) {
                return $class;
            }
        }
    }
    return "";
}

/**
 * @param $prefix
 * @param $controller
 * @param $name
 * @param null $permission
 * @param array|string[] $except
 */
function resourceAdmin($prefix, $controller, $name, $permission = null, array $except = [])
{
    if ($permission === null) {
        $permission = $name;
    }
    Route::group(['prefix' => $prefix], function () use ($controller, $name, $permission, $except) {
        if (!in_array('index', $except)) {
            Route::get('/', "{$controller}@index")->name("{$name}.index")->middleware("permission:admin.{$permission}.index");
        }

        if (!in_array('datatable', $except)) {
            Route::get('datatable', "{$controller}@datatable")->name("{$name}.datatable")->middleware("permission:admin.{$permission}.index");
        }
        if (!in_array('show', $except)) {
           
            Route::get('{id}', "{$controller}@show")->name("{$name}.show")->middleware("permission:admin.{$permission}.show");
        }

        if (!in_array('create', $except)) {
            Route::get('create', "{$controller}@create")->name("{$name}.create")->middleware("permission:admin.{$permission}.create");
            Route::post('/', "{$controller}@store")->name("{$name}.store")->middleware("permission:admin.{$permission}.create");
        }

        if (!in_array('edit', $except)) {
            Route::get('{id}/edit', "{$controller}@edit")->name("{$name}.edit")->middleware("permission:admin.{$permission}.edit");
            Route::put('{id}', "{$controller}@update")->name("{$name}.update")->middleware("permission:admin.{$permission}.edit");
        }

        if (!in_array('destroy', $except)) {
            Route::delete('{id}', "{$controller}@destroy")->name("{$name}.destroy")->middleware("permission:admin.{$permission}.destroy");
        }
    });
}

function removeAllConfig()
{
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');

    session(['locale_ip' => '']);
}

/**
 * @param $path
 * @param bool $name
 * @return array|string|string[]|null
 */
function fileNameFromPath($path, bool $name = true)
{
    if (!$path) {
        return null;
    }
    $string = str_replace('.blade.php', '', $path);

    if (!$name) {
        return $string;
    }

    $string = str_replace('-', ' ', $string);

    return ucwords($string);
}

/**
 * @param $string
 * @return bool
 */
function checkStringContainsHtml($string): bool
{
    return $string != strip_tags($string);
}

// Get Url Menu Item
function getUrlHtmlItem($type, $menu_item_id)
{
    $menu_item = MenuItem::query()->find($menu_item_id);

    switch ($type) {
        case 'custom_link':
            $url = $menu_item->url;
            break;
        case 'page':
            $data = Page::query()->find($menu_item->referencer_id);
            $url = !empty($data) ? route('page.show', ['slug' => $data->slug]) : '';
            break;
        default:
            $data = DB::table($type)->where('id', $menu_item->referencer_id)->first();
            // Do something
            $url = '';
    }

    return $url;
}

/**
 * @param string $str
 * @return string
 */
function contentRender(string $str): string
{
    return checkStringContainsHtml($str) ? $str : '<p>' . $str . '</p>';
}

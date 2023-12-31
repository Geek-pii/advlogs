<?php

namespace App\Models;

use App\Traits\MetadataTrait;
use App\Traits\SlugTranslationTrait;
use App\Traits\TranslatableExtendTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class MenuItem extends Model implements Transformable, TranslatableContract
{
    use Translatable, TranslatableExtendTrait, TransformableTrait, MetadataTrait, SlugTranslationTrait;

    protected $table = 'menu_item';

    protected $fillable = [
        'parent_id',
        'level',
        'type',
        'referencer_id',
        'position',
        'class',
        'target',
        'active'
    ];

    public $translatedAttributes = [
        'title',
        'slug',
        'url',
    ];

    public $slug_from_source = 'title';

    public function menus()
    {
        return $this->belongsToMany(Menu::class, "menu_menu_item", "menu_item_id", "menu_id");
    }

    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public static function types($key = null)
    {
        $type = [
            'custom_link', // Default
            'page' // Name table
        ];

        $arr = array();
        foreach ($type as $value) {
            array_push($arr, [$value => strtolower($value)]);
        }

        $arr = array_collapse($arr);

        return $key ? $arr[$key] : $arr;
    }

    public static function target($key = null)
    {
        $type = [
            '_blank',
            '_self',
            '_parent',
            '_top'
        ];

        $arr = array();
        foreach ($type as $value) {
            array_push($arr, [$value => strtolower($value)]);
        }
        $arr = array_collapse($arr);
        return $key ? $arr[$key] : $arr;
    }

    /* 
        $type_menu: header, footer, ...
    */
    public static function tree($parent_id = 0, $type_menu = 'header')
    {
        $result = self::select("*")
            ->whereHas('menus', function ($query) use ($type_menu) {
                $query->where('menu.type', $type_menu);
            })
            ->where('parent_id', $parent_id)
            ->where('active', 1)
            ->orderBy('position', 'asc')
            ->get();

        foreach ($result as $rs) {
            $rs->trees = self::tree($rs->id, $type_menu);
        }

        return $result;
    }

    /* 
        All type menu
    */
    public static function treeCMS($parent_id = 0)
    {
        $result = self::select("*")
            ->where('parent_id', $parent_id)
            ->get();

        foreach ($result as $rs) {
            $rs->trees = self::treeCMS($rs->id);
        }

        return $result;
    }

    // Show select option CMS
    public static function getSelectOption($list, $default = null, $root = 0, $plus = '»»')
    {
        $html = '';
        if ($root === 0) {
            $selected = $default === 0 ? 'selected' : '';
            $html = '<option value="0"' . $selected . '>Root</option>';
        }
        foreach ($list as $rs) {
            $selected = $rs->id === $default ? 'selected' : '';
            $typeMenu = strtoupper(implode(', ', $rs->menus()->pluck('type')->toArray()));

            $html .= '<option ' . $selected . ' value=' . $rs->id . '>' . $plus . $rs->title . ' (' . $typeMenu . ')' . '</option>';
            if ($rs->trees && $rs->trees->count()) {
                $html .= self::getSelectOption($rs->trees, $default, 1, $plus . '»»');
            }
        }

        return $html;
    }

    // Show menu item list in CMS
    public static function getMenuItemListCMS($tree = [])
    {
        $html = '';

        if (!$tree || !count($tree))
            $html .= '';
        else {
            $html .= '<ul class="list-unstyled sortable-menu-item">';
            foreach ($tree->sortBy('position') as $rs) {
                $linkEdit = route("admin.menu.item.edit", $rs->id);
                $linkDelete = route("admin.menu.item.destroy", $rs->id);
                $class = count($rs->trees) ? 'd-name' : '';
                $typeMenu = strtoupper(implode(', ', $rs->menus()->pluck('type')->toArray()));

                $html .= '<li class="list-group-item" data-id="' . $rs->id . '">';
                $html .= '<div class="c-name ' . $class . '">';
                $html .= $rs->position . '. ' . $rs->title . '<span> (' . $typeMenu . ') </span>';
                $html .= '<a class="btn-edit-category btn btn-xs btn-info" type="button" href="' . $linkEdit . '">Edit</a>';
                $html .= ' <button class="btn-delete-record btn btn-xs btn-danger btn-delete" type="button" data-title="Do you want to remove <strong>' . (checkStringContainsHtml($rs->title) ? $rs->id : $rs->title) . '</strong>?" data-url="' . $linkDelete . '">Delete</button></div>';

                if ($rs->trees || count($rs->trees)) {
                    $html .= self::getMenuItemListCMS($rs->trees);
                }
                $html .= '</li>';
            }

            $html .= '</ul>';
        }

        return $html;
    }

    // Show header menu item html to html
    public static function getHeaderMenuHtml($tree = [], $count = 0)
    {

        $html = '';

        if (!$tree || !count($tree)) {
            $html .= '';
        } else {
            foreach ($tree->sortBy('position') as $rs) {
                $title = $rs->title;
                $url = getUrlHtmlItem($rs->type, $rs->id);
                $target = $rs->target;
                $class = !empty($rs->class) ? $rs->class : 'arrow';
                $current = \Request::url() == $url ? 'current' : '';

                if (count($rs->trees) && $rs->level == 0) {
                    $html .= '<li class="hassub ' . $current . '">';
                    $html .= '<a href="' . $url . '" title="' . $title . '"><span>' . $title . '</span></a>';

                    if (count($rs->trees) >= 5) {
                        $html .= '<ul class="sub sub--mega sub--full">';
                    } else {
                        $html .= '<ul class="sub sub--mega">';
                    }
                }

                if (!count($rs->trees)) {
                    if ($rs->level == 1) {
                        $html .= '<li class="col-sm-4 ' . $current . '">';
                    }
                    if ($rs->level > 1) {
                        $html .= '<li class="' . $current . '">';
                    }
                }

                if (count($rs->trees)) {
                    if ($rs->level == 1) {
                        $html .= '<li class="col-sm-4 ' . $current . '">';
                        $html .= '<h3>' . $title . '<i class="' . $class . '"></i></h3>';
                        $html .= '<ul>';
                    }

                    $html .= self::getHeaderMenuHtml($rs->trees, $count + 1);
                    $html .= '</ul>';

                    if ($rs->level == 1) {
                        $html .= '</li>';
                    }
                }

                if (!count($rs->trees)) {
                    if ($rs->level == 0) {
                        $html .= '<li class="' . $current . '"><a href="' . $url . '" title="' . $title . '" target="' . $target . '"><span>' . $title . '</span></a></li>';
                    }
                    if ($rs->level > 0) {
                        $html .= '<a href="' . $url . '" target="' . $target . '" title="' . $title . '">' . $title . '</a>';
                    }
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    // Show top menu item html to html
    public static function getTopHeaderMenuHtml($tree = [])
    {

        $html = '<ul class="navbar-links hidden-xs">';

        foreach ($tree->sortBy('position') as $rs) {
            $title = $rs->title;
            $url = getUrlHtmlItem($rs->type, $rs->id);
            $target = $rs->target;

            if ($rs->level == 0) {
                $html .= '<li><a target="' . $target . '" href="' . $url . '" title="' . $title . '">' . $title . '</a></li>';
            }

            if (count($rs->trees)) {
                $html .= self::getTopHeaderMenuHtml($rs->trees);
            }
        }

        $html .= '</ul>';

        return $html;
    }

    // Show footer menu item html to html
    public static function getFooterMenuHtml($tree = [])
    {

        $html = '';

        foreach ($tree->sortBy('position') as $rs) {
            $title = $rs->title;
            $url = getUrlHtmlItem($rs->type, $rs->id);
            $target = $rs->target;

            if ($rs->level == 0) {
                $html .= '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">';
                $html .= '      <h3>' . $title . '</h3>';
                $html .= '      <ul class="menu">';
            }

            if ($rs->level > 0) {
                $html .= '<li><a href="' . $url . '" target="' . $target . '">' . $title . '</a></li>';
            }

            if (count($rs->trees)) {
                $html .= self::getFooterMenuHtml($rs->trees);
            }

            if ($rs->level == 0) {
                $html .= '      </ul>';
                $html .= '</div>';
            }
        }

        return $html;
    }
}

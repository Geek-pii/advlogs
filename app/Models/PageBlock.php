<?php

namespace App\Models;

use App\Traits\MediaTrait;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class PageBlock extends Model implements Transformable, TranslatableContract
{
    use Translatable, TransformableTrait, MediaTrait;

    const TYPE_URL = 'TYPE_URL';
    const TYPE_NAME = 'TYPE_NAME';
    const TYPE_DESCRIPTION = 'TYPE_DESCRIPTION';
    const TYPE_CONTENT = 'TYPE_CONTENT';
    const TYPE_ICON = 'TYPE_ICON';
    const TYPE_PHOTO = 'TYPE_PHOTO';
    const TYPE_PHOTO_MOBILE = 'TYPE_PHOTO_MOBILE';
    const TYPE_PHOTO_TRANSLATION = 'TYPE_PHOTO_TRANSLATION';
    const TYPE_MULTI_PHOTOS = 'TYPE_MULTI_PHOTOS';

    protected $table = 'page_block';

    protected $fillable = [
        'page_id',
        'parent_id',
        'code',
        'types',
        'icon',
        'photo',
        'photo1',
        'photo_mobile',
        'image_map_id',
        'position',
    ];

    public $translatedAttributes = [
        'url',
        'name',
        'description',
        'content',
        'photo_translation',
        // 'alt_icon',
        // 'alt_photo',
        // 'alt_photo_mobile'
    ];

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper(Str::slug(trim($value)));
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public static function types($key = null)
    {
        $arr = [
            self::TYPE_URL => trans('admin_page_block.attr.TYPE_URL'),
            self::TYPE_NAME => trans('admin_page_block.attr.TYPE_NAME'),
            self::TYPE_DESCRIPTION => trans('admin_page_block.attr.TYPE_DESCRIPTION'),
            self::TYPE_CONTENT => trans('admin_page_block.attr.TYPE_CONTENT'),
            self::TYPE_ICON => trans('admin_page_block.attr.TYPE_ICON'),
            self::TYPE_PHOTO => trans('admin_page_block.attr.TYPE_PHOTO'),
            self::TYPE_PHOTO_MOBILE => trans('admin_page_block.attr.TYPE_PHOTO_MOBILE'),
            self::TYPE_PHOTO_TRANSLATION => trans('admin_page_block.attr.TYPE_PHOTO_TRANSLATION'),
            self::TYPE_MULTI_PHOTOS => trans('admin_page_block.attr.TYPE_MULTI_PHOTOS'),
        ];
        return $key ? $arr[$key] : $arr;
    }

    public function getDecodeTypesAttribute()
    {
        return $this->types ? json_decode($this->types) : [];
    }

    public function getTypeNamesAttribute()
    {
        $types = self::types();
        $decode_types = $this->decode_types;
        $arr_name = [];
        foreach ($types as $key => $name) {
            if (in_array($key, $decode_types)) {
                $arr_name[] = $name;
            }
        }
        return '<span class="label bg-red m-r-5">' . implode('</span><span class="label bg-red m-r-5">', $arr_name) . '</span>';
    }

    public function deleteMe()
    {
        if (in_array(self::TYPE_MULTI_PHOTOS, $this->decode_types)) {
            $this->deleteMedias(1, true);
        }
        $this->delete();
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('position', 'asc');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function getImageMapAttribute()
    {
        return $this->image_map_id ? $this->belongsTo(ImageMap::class, 'image_map_id')->first() : null;
    }
}

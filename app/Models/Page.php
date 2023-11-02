<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Traits\MetadataTrait;
use App\Traits\TranslatableExtendTrait;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Page extends Model implements Transformable, TranslatableContract
{
    use Translatable, TranslatableExtendTrait, TransformableTrait, MetadataTrait;

    protected $table = 'page';

    protected $fillable = [
        'parent_id',
        'code',
        'group_code',
        'theme',
        'active',
        'position'
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'content',
        'slug'
    ];

    public $slug_from_source = 'title'; // dung title để chuyển qua slug trong translation, default name

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper(Str::slug(trim($value)));
    }

    public function setGroupCodeAttribute($value)
    {
        $this->attributes['group_code'] = strtoupper(Str::slug(trim($value)));
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id')->withTranslation();
    }

    public function blocks()
    {
        return $this->hasMany(PageBlock::class, 'page_id')
            ->orderBy('position', 'asc');
    }

    public function parentBlocks()
    {
        return $this->hasMany(PageBlock::class, 'page_id')
            ->where('parent_id', '0')
            ->orderBy('position', 'asc');
    }

    // Lấy các page cùng loại
    public function getGroupPageAttribute()
    {
        if ($this->group_code) {
            return self::where('group_code', $this->group_code)
                ->withTranslation()
                ->active()
                ->requiredTranslation()
                ->orderBy('position', 'asc')
                ->get();
        }

        return [];
    }

    public function getUrlAttribute()
    {
        $locale = app()->getLocale();
        if ($locale !== 'vi') {
            return "/{$locale}/{$this->slug}";
        }
        return "/{$this->slug}";
    }
}

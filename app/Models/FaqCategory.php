<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class FaqCategory extends Model implements TranslatableContract
{
    use Translatable, TransformableTrait;

    protected $table = 'faq_category';

    protected $fillable = [
        'parent_id',
        'level',
        'position',
        'active',
    ];

    public $translatedAttributes = [
        'name',
        'description',
    ];

    public $translationModel = 'App\Models\FaqCategoryTranslation';

    public $translationForeignKey = 'faq_category_id';

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function parent()
    {
        return $this->belongsTo(FaqCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(FaqCategory::class, 'parent_id', 'id');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'category_id');
    }
}

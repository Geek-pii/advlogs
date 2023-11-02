<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Faq extends Model implements TranslatableContract
{
    use Translatable, TransformableTrait;

    protected $table = 'faq';

    protected $fillable = [
        'category_id',
        'position',
        'active',
    ];

    public $translatedAttributes = [
        'title',
        'description',
    ];

    public $translationModel = 'App\Models\FaqTranslation';

    public $translationForeignKey = 'faq_id';

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'category_id');
    }
}

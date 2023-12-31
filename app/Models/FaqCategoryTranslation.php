<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategoryTranslation extends Model
{
    protected $table = 'faq_category_translation';

    protected $fillable = [
        'name',
        'description',
    ];

    public $timestamps = false;
}

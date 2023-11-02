<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    protected $table = 'faq_translation';

    protected $fillable = [
        'title',
        'description',
    ];

    public $timestamps = false;
}

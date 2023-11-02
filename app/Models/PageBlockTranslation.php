<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageBlockTranslation extends Model
{
    protected $table = "page_block_translation";

    protected $fillable = [
        'url',
        'name',
        'description',
        'content',
        'photo_translation',
        // 'alt_icon',
        // 'alt_photo',
        // 'alt_photo_mobile'
    ];

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Metadata extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = "metadata";

    public $translatedAttributes = [
        'image',
        'title',
        'description',
        'key_word',
        'custom_html'
    ];

    protected $fillable = [
        'meta_key',
        'object_id'
    ];
}

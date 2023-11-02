<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class System extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = "systems";

    protected $fillable = [
        "key",
        "content"
    ];

    protected static $system;

    public $system_key = [
        'website_logo',
        'maintenance_mode',
        'email',
        'phone',
        'address',
        'facebook',
        'youtube',
        'google',
        'twitter',
        'likedin',
        'instagram',
        'website_title',
        'website_description',
        'website_keywords',
        'email_certificate_of_insurance',
        'email_signature_request_invitation',
        'carrier_broker_agreement'
    ];

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = !empty($value) ? is_array($value) ? json_encode($value) : $value : null;
    }

    public function getContentAttribute($value)
    {
        if (is_numeric($value)) {
            return $value;
        }
        $data = @json_decode($value);
        return (json_last_error() === JSON_ERROR_NONE) ? ((array)$data) : $value;
    }

    public static function content($key, $default = null)
    {
        $model = self::$system ? self::$system : self::$system = self::select('key', 'content')->pluck('content', 'key')->toArray();
        if (!empty($model[$key]) && is_array($model[$key])) {
            $locale = app()->getLocale();
            return $model[$key][$locale] ?? $default;
        }

        return $model[$key] ?? $default;
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as BaseTrimmer;

class TrimStrings extends BaseTrimmer
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
    
    protected function transform($key, $value)
    {
        if (in_array($key, $this->except, true)) {
            return $value;
        }

        // if (in_array($key, ['mobile_number', 'primary_contact_number', 'business_phone_number', 'contact_phone', 'contact_phone_1'])) {
        //     return str_replace([' ', '(', ')', '-'], '', $value);
        // }

        return is_string($value) ? trim($value) : $value;
    }
}

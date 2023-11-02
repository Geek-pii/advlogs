<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneValidationHistory extends Model
{
    public $table = 'phone_validation_history';

    public $casts = ['api_result' => 'array'];

    public $guarded = [];
}
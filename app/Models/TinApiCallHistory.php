<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinApiCallHistory extends Model
{
    protected $table = 'tin_api_call_history';
    protected $fillable = [
        'process_number',
        'process_name',
        'process_type',
        'response',
    ];

    public $casts = ['response' => 'array'];

}
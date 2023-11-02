<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentPlan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'use_factory',
        'pay_to',
        'days_paid',
        'day_type', 
        'fee',
        'offer_start',
        'offer_expiration'
    ];

//    public $appends = ['offer_date'];

    public function setFeeAttribute($value)
    {
        return is_numeric($value) && $this->attributes['fee'] = $value.'%';
    }

//    public function getOfferDateAttribute()
//    {
//        return $this->attributes['offer_start'].' - '.$this->attributes['offer_expiration'];
//    }
}

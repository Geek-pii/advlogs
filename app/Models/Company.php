<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Company.
 *
 * @package namespace App\Models;
 */
class Company extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'use_factory', 
        'company_legal_name', 
        'company_dba', 
        'account_id', 
        'carrier_certificate_person',
        'carrier_certificate_email',
        'carrier_or_dot_search',
        'mc_number',
        'dot_number'
    ];

    protected $dates = [
        'agreement_checked_date'
    ];
    
    public function taxPayer()
    {
        return $this->hasOne('App\Models\TaxPayer');
    }

    public function accounts()
    {
        return $this->hasMany('App\Models\Account', 'company_id', 'id');
    }

    public function carrierPaymentPlans()
    {
        return $this->belongsToMany(PaymentPlan::class, 'carrier_payment_plan', 'company_id', 'payment_plan_id');
    }
    public function getTypeAttribute()
    {
        return $this->accounts()->first()->type;
    }
    public function address()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}

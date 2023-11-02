<?php

namespace App\Models;

use App\Models\Address;
use App\Models\Company;
use App\Models\GetAQuote;
use App\Models\PickUpInfo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasAccountRoleAndPermission;

class Account extends Authenticatable implements CanResetPassword
{
    use Notifiable, SoftDeletes, HasAccountRoleAndPermission, Notifiable;

    protected $guard = 'account';

    protected $table = 'account';

    const MAX_TIN_API_CALLS = 3;

    protected $fillable = [
        'type',
        'company_id',
        'step_progress',
        'mobile_number',
        'email',
        'alternate_email',
        'password',
        'first_name',
        'last_name',
        'primary_contact_number',
        'job_title',
        'business_phone_number',
        'business_phone_ext',
        'security_code',
        'active',
        'remember_token',
        'agreement_checked_date',
        'agreement_checked',
        'mobile_number_type', 
        'primary_contact_number_type', 
        'business_phone_number_type',
        'tin_api_calls'
    ];

    protected $casts = [
        'invoice_emails' => 'array'
    ];



    protected $hidden = [
        "password",
        "remember_token",
    ];

    public static $types = [
        'personal' => 'Personal Vehicle account',
        'business' => 'Business Client account',
        'carrier' => 'Carrier account'
    ];

    protected $appends = ['account_step_number', 'full_name'];

    public static $personalAccountSteps = ['signed-up', 'quote_binded', 'agreement_checked', 'filled_pickup_information', 'filled_delivery_information'];
    public static $bizAccountSteps = ['signed-up', 'setted-up-profile_step_1', 'setted-up-profile_step_2', 'setted-up-profile_step_3', 'setted-up-profile_step_4', 'agreement_checked', 'setted-billing-info'];
    public static $carrierAccountSteps = [
        'signed-up', 'setted-up-profile_step_1', 'setted-up-profile_step_2', 'setted-up-profile_step_3', 'setted-up-profile_step_4', 'agreement_checked',
        'setted-up-load_step_1', 'setted-up-load_step_2', 'setted-up-load_step_3', 'setted-up-load_step_4', 'setted-up-payment_step_1', 'setted-up-payment_step_2', 'setted-up-payment_step_3', 'setted-up-payment_step_4', 'setted-up-payment_step_5', 'setted-up-payment_step_6'
    ];

    const CARRIER_PROFILE_STEPS = [
        'setted-up-profile_step_1' => 2,
        'setted-up-profile_step_2' => 3,
        'setted-up-profile_step_3' => 4,
    ];

    CONST CARRIER_LOAD_STEPS = [
        'setted-up-load_step_1' => 2,
        'setted-up-load_step_2' => 3,
        'setted-up-load_step_3' => 4,
    ];

    const CARRIER_PAYMENT_STEPS = [
        'setted-up-payment_step_1' => 2,
        'setted-up-payment_step_2' => 3,
        'setted-up-payment_step_3' => 4,
        'setted-up-payment_step_4' => 5,
        'setted-up-payment_step_5' => 6
    ];


    public function getAccountStepNumberAttribute()
    {
        if (auth('account')->check()) {
            $authorizer = auth()->guard('account')->user();
            if ($authorizer->type == 'personal') {
                return array_flip(self::$personalAccountSteps)[$authorizer->step_progress] + 1;
            }
            if ($authorizer->type == 'business') {
                return array_flip(self::$bizAccountSteps)[$authorizer->step_progress] + 1;
            }
            if ($authorizer->type == 'carrier') {
                return array_flip(self::$carrierAccountSteps)[$authorizer->step_progress] + 1;
            }
        }
    }

    public function getFullNameAttribute()
    {
        return sprintf("%s %s", $this->first_name, $this->last_name);
    }
    public function getActiveAttribute($value)
    {
        return $value == 0 ? 'N' : 'Y';
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function carrierPaymentPlans()
    {
        return $this->belongsToMany(PaymentPlan::class, 'carrier_payment_plan', 'account_id', 'payment_plan_id');
    }

    public function personalQuote()
    {
        return $this->hasOne(GetAQuote::class);
    }
    public function pickUpInfo()
    {
        return $this->hasOne(PickUpInfo::class);
    }
    public function address()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class DeliveryInfo.
 *
 * @package namespace App\Models;
 */
class DeliveryInfo extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'street_address',
        'location_type',
        'pick_up_date',
        'city',
        'state',
        'zip',
        'company_name',
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_phone_1',
        'notes'
    ];

}

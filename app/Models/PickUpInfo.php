<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PickUpInfo.
 *
 * @package namespace App\Models;
 */
class PickUpInfo extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'pick_up_info';

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

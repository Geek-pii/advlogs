<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CarrierLoad.
 *
 * @package namespace App\Models;
 */
class CarrierLoad extends Model
{
    use SoftDeletes;

    protected $casts = [
        'equipment_capacity' => 'array',
        'vehicle_types' => 'array',
        'routes' => 'array',
        'send_offer' => 'array',
    ];

    protected $fillable = [
       'company_id', 'equipment_capacity', 'vehicle_types', 'routes', 'send_offer', 'max_offers','account_id', 'truck_have_winch', 'no_future_loads', 'has_notification_request'
    ];

//    public function setSendOfferAttribute($sendTos)
//    {
//        $result = [];
//        foreach($sendTos as $sendTo) {
//            if (!str_contains($sendTo, '@')) {
//                $result[] = str_replace([' ', '(', ')'], '', $sendTo);
//            } else {
//                $result[] = $sendTo;
//            }
//        }
//        $this->attributes['send_offer'] = json_encode($result);
//    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

}

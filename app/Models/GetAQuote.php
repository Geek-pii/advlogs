<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetAQuote extends Model
{
    use HasFactory;

    protected $table = 'get_a_quote';

    protected $fillable = [
        'quote_number',
        'account_id',
        'picking_zip',
        'delivery_zip',
        'preferred_pick_up_date',
        'year',
        'make',
        'model',
        'condition',
        'run_drives',
        'rolls_steers_brakes',
        'transport_type',
        'transport_speed',
        'is_modifications',
        'modification_description',
        'first_name',
        'last_name',
        'email_address',
        'phone_number'
    ];

    public static $conditions = [
        'Used',
        'New'
    ];

    public static $run_drives = [
        'Yes',
        'No'
    ];

    public static $rolls_steers_brakes = [
        'Yes',
        'No'
    ];

    public static $transport_types = [
        'Open',
        'Enclosed'
    ];

    public static $transport_speeds = [
        'Standard',
        'Expedited'
    ];

    public static $is_modifications = [
        '1',
        '0'
    ];
}

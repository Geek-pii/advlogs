<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'invoice_emails' => 'array'
    ];

    protected $fillable = [
        'account_id',
        'company_id',
        'sub_type',
        'street_address',
        'country',
        'state',
        'city',
        'zip',
        'telephone',
        'email',
        'mailing_address_same_as_physical'
    ];

    public function addressable()
    {
        return $this->morphTo();
    }
}

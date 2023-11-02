<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxPayer extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'account_id',
        'company_id',
        'payer_name',
        'biz_name',
        'social_security_number',
        'employer_identification_number',
        'federal_tax_classification',
        'tax_classification_value',
        'other_tax_classification_value',
        'address',
        'city',
        'state',
        'zip'
    ];
}

<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class DeliveryInfoValidator.
 *
 * @package namespace App\Validators;
 */
class DeliveryInfoValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            "location_type" => 'required',
            "street_address" => 'required',
			"city" => 'required',
			"state" => 'required',
			"zip" => 'required',
            "company_name" => 'string|nullable',
			"contact_name" => 'required',
			"contact_email" => 'required|email',
			"contact_phone" => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}

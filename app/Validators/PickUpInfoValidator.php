<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PickUpInfoValidator.
 *
 * @package namespace App\Validators;
 */
class PickUpInfoValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
			"location_type" => 'required',
			"pick_up_date" => 'required',
            "street_address" => 'required',
			"city" => 'required',
			"state" => 'required',
			"zip" => 'required',
            "company_name" => 'string|nullable',
			"contact_name" => 'required',
			"contact_email" => 'required|email',
			"contact_phone" => 'required',
			"notes" => 'nullable'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}

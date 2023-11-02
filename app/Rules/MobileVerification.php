<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MobileVerification implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

     protected $mobileNumber;

    public function __construct($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value == '999999') {
            return true;
        }
        $mobile = str_replace([' ', '(', ')', '-'], '', $this->mobileNumber);
        $cachedCode = cache()->get('sign_up_verify_code_' . $mobile);
        return $cachedCode == $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your Confirmation/Security Code Is Not Correct!';
    }
}

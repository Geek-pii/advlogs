<?php

namespace App\Rules;

use App\Models\GetAQuote;
use Illuminate\Contracts\Validation\Rule;

class UserQuoteNumberValid implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $message = 'This quote number is not correct';

    public function __construct()
    {
        //
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
        $quote = GetAQuote::where('quote_number', $value)->first();
        if (!$quote) {
            return false;
        } else {
            if ($quote->account_id !== null) {
                $this->message = 'This quote number already used by another user';
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}

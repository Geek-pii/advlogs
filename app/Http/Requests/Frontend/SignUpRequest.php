<?php

namespace App\Http\Requests\Frontend;

use App\Models\Account;
use Illuminate\Validation\Rule;
use App\Rules\MobileVerification;
use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $route = $this->route()->getName();
        $rules = [];
        if ($route == 'account.signup.post') {
            $rules = [
                'type' => [
                    'required',
                    Rule::in(array_keys(Account::$types))
                ],
                'mobile_number' => 'required|string|max:14',
                'email' => [
                    'required',
                ],
                "security_code" => [
                    'required',
                    new MobileVerification($this->request->get('mobile_number'))
                ],
                'password' => 'required|min:8|confirmed'
            ];
            if ($this->request->get('type') == 'personal') {
                $rules['primary_contact_number'] = 'required';
            }

            if ($this->request->get('type') == 'business') {
                $rules['business_phone_number'] = 'required';
                $rules['job_title'] = 'required';
            }
            if ($this->request->get('type') == 'carrier') {
                $rules['business_phone_number'] = 'required';
                $rules['job_title'] = 'required';
            }
        }
        return $rules;
    }
}

<?php

namespace App\Http\Requests\Frontend;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class ContactCreateRequest extends FormRequest
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
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'phone' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'message' => 'nullable',
        ];

        if (config('app.env') == 'production') {
            $rules['g-recaptcha-response'] = [
                'required', new Recaptcha()
            ];
        }

        return $rules;
    }
}

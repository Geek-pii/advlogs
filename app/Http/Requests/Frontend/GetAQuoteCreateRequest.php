<?php

namespace App\Http\Requests\Frontend;

use App\Models\GetAQuote;
use App\Rules\Recaptcha;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GetAQuoteCreateRequest extends FormRequest
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
        // if (config('app.env') == 'production') {
        //     $rules['g-recaptcha-response'] = [
        //         'required', new Recaptcha()
        //     ];
        // }

        $rules = [
            'picking_zip' => 'nullable|string|max:255',
            'delivery_zip' => 'nullable|string|max:255',
            'preferred_pick_up_date' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:255',
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'condition' => [
                'nullable',
                'string',
                'max:255',
                Rule::in(GetAQuote::$conditions),
            ],
            'run_drives' => [
                'nullable',
                'string',
                'max:255',
                Rule::in(GetAQuote::$run_drives),
            ],
            'rolls_steers_brakes' => [
                'nullable',
                'string',
                'max:255',
                Rule::in(GetAQuote::$rolls_steers_brakes),
            ],
            'transport_type' => [
                'nullable',
                'string',
                'max:255',
                Rule::in(GetAQuote::$transport_types),
            ],
            'transport_speed' => [
                'nullable',
                'string',
                'max:255',
                Rule::in(GetAQuote::$transport_speeds),
            ],
            'is_modifications' => [
                'nullable',
                'string',
                'max:255',
                Rule::in(GetAQuote::$is_modifications),
            ],
            'modification_description' => 'nullable',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email_address' => 'nullable|email|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'bind_account' => 'nullable'
        ];

        // if (config('app.env') == 'production') {
        //     $rules['g-recaptcha-response'] = [
        //         'required', new Recaptcha()
        //     ];
        // }

        return $rules;
    }
}

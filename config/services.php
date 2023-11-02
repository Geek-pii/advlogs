<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'map_key' => env('GOOGLE_MAP_API_KEY'),
    ],

    'captcha' => [
        'site_key' => env('GOOGLE_CAPTCHA_SITE_KEY'),
        'secret_key' => env('GOOGLE_CAPTCHA_SECRET_KEY'),
    ],

    'facebook' => [
        'app_id' => ''
    ],

    'subscribe' => [
        'mailchimp_api_key' => env('MAILCHIMP_API_KEY'),
        'mailchimp_list_id' => env('MAILCHIMP_LIST_ID'),
    ],
    'twilio' => [
        'sid' => env('TWILIO_SID'),
        'token' => env('TWILIO_TOKEN'),
        'from_mobile' => env('TWILIO_FROM_MOBILE')
    ],
    'fmcsa' => [
        'api_url' => env('FMCSA_API_URL'),
        'web_key' => env('FMCSA_WEB_KEY')
    ],
    'irs' => [
        'api_url' => env('IRS_API_URL'),
        'api_user_id' => env('IRS_USER_ID'),
        'client_id' => env('IRS_CLIENT_ID'),
    ]
];

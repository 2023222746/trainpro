<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Fiuu Payment Gateway
    |--------------------------------------------------------------------------
    |
    | Fiuu (formerly iPay88) is a Malaysian payment gateway.
    | These credentials are used for payment processing.
    |
    | https://github.com/FiuuPayment
    |
    */

    'fiuu' => [
        'merchant_key' => env('FIUU_MERCHANT_KEY'),
        'merchant_id' => env('FIUU_MERCHANT_ID'),
        'sandbox' => env('FIUU_SANDBOX', true),
        'return_url' => env('FIUU_RETURN_URL', '/payment/callback'),
        'backend_url' => env('FIUU_BACKEND_URL', '/payment/backend'),
    ],

    /*
    |--------------------------------------------------------------------------
    | HRDCorp (Human Resource Development Corporation)
    |--------------------------------------------------------------------------
    |
    | HRDCorp is Malaysia's training levy management system.
    |
    */

    'hrdcorp' => [
        'api_key' => env('HRDCORP_API_KEY'),
        'api_url' => env('HRDCORP_API_URL', 'https://hrdcorp.com/api'),
    ],
];

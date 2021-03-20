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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '316407009514422',
        'client_secret' => 'a2ca19aaa88f5f9223e52fa71a9abd60',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    'github' => [
        'client_id' => '2b72ed2ea9f65554336b',
        'client_secret' => '21d13aca1e31295d03895fe3ca59d662681bb96c',
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],

];

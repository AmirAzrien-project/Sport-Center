<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

 return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can be 'sandbox' or 'live'
    'sandbox' => [
        'client_id'     => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
        'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
        'app_id'        => '',
    ],
    'live' => [
        'client_id'     => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'client_secret' => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
        'app_id'        => '',
    ],
    'payment_action' => 'Sale', // Can be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => '', // Change this accordingly for your application.
    'locale'         => '',

    'http' => [
        'headers' => [
            'PayPal-Partner-Attribution-Id' => '',
        ],
        'verify' => '/path/to/cacert.pem', // Path to your downloaded cacert.pem file
    ],
];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Payment Gateway
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('PAYMENT_DRIVER', 'kuveytturk'),



    'gateways' => [

        'kuveytturk' => [
            'type'          => 'Sale',
            'API_version'   => '1.0.0',
            'currency_code' => '0949',
            'customer_id'   => '',
            'merchant_id'   => '',
            'username'      => '',
            'password'      => '',
            'three_d_base_url'      => 'https://boa.kuveytturk.com.tr',
            'collection_base_url'   => 'https://boa.kuveytturk.com.tr/BOA.Integration.WCFService/BOA.Integration.VirtualPos/VirtualPosService.svc?wsdl',
        ],
    ],

];
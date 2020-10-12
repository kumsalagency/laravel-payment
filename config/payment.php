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

        'yapikredi' => [
            'client_id'         => '',
            'terminal_id'       => '',
            'posnet_id'         => '',
            'username'          => '',
            'password'          => '',
            'store_key'         => '',
            'promotion_code'    => '',
            'base_url'          => 'https://www.posnet.ykb.com',
        ],
    ],

];
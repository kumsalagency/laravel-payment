<?php

return [
    'error' => [
        \KumsalAgency\Payment\PaymentException::ErrorGeneral => 'An error has occurred with virtual pos!',
        \KumsalAgency\Payment\PaymentException::ErrorConnection => '',
        \KumsalAgency\Payment\PaymentException::ErrorNotSupportedMailOrder => '',
        \KumsalAgency\Payment\PaymentException::ErrorNotSupportedThreeD => '',
        \KumsalAgency\Payment\PaymentException::ErrorPosUnexpectedReturn => '',
    ],
    'kuveytturk'=> [
        'messages' => [
            '00' => '',
            'InvalidCardExpireDateFormat' => '',
            'PosMerchantIPError' => '',
        ],
    ]
];
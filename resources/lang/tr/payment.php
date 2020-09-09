<?php

return [
    'error' => [
        \KumsalAgency\Payment\PaymentException::ErrorGeneral => 'Sanal pos ile ilgili bir hata oluştu!',
        \KumsalAgency\Payment\PaymentException::ErrorConnection => 'Sanal posa bağlantı ile ilgili bir hata oluştu!',
        \KumsalAgency\Payment\PaymentException::ErrorNotSupportedMailOrder => 'Sanal pos mail order yöntemini desteklemiyor.',
        \KumsalAgency\Payment\PaymentException::ErrorNotSupportedThreeD => 'Sanal pos 3D yöntemini desteklemiyor.',
        \KumsalAgency\Payment\PaymentException::ErrorPosUnexpectedReturn => 'Sanal pos ile ilgili beklenmedik bir hata oluştu!',
    ],
    'kuveytturk'=> [
        'messages' => [
            '00' => 'Ödemeniz Başarıyla alınmıştır.',
            'InvalidCardExpireDateFormat' => 'Kart son kullanım tarihini ay ve yıl olarak (AA / YY formatında) giriniz.',
            'PosMerchantIPError' => 'IP adresi tanımlı değildir.',
        ],
    ]
];

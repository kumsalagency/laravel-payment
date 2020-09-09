<?php


namespace KumsalAgency\Payment;


use Throwable;

class PaymentException extends \Exception
{
    public const
        ErrorGeneral = 0,
        ErrorConnection = 1,
        ErrorNotSupportedMailOrder = 2,
        ErrorNotSupportedThreeD = 3,
        ErrorPosUnexpectedReturn = 4;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->message = !is_null($message) ?
            $message :
            trans('payment::payment.error.'.$code);

        parent::__construct($this->message,$code,$previous);

    }
}
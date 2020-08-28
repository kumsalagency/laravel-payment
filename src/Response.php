<?php


namespace KumsalAgency\Payment;


abstract class Response
{
    /**
     * @var mixed
     */
    public $rawResponse;

    abstract public function success(): bool;
    abstract public function error(): bool;
    abstract public function getMessage(): string;
    abstract public function getCode();
    abstract public function getID();

    /**
     * @return mixed
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }
}
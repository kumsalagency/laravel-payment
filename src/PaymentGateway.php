<?php


namespace KumsalAgency\Payment;



use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Client\Request;

abstract class PaymentGateway
{
    /**
     * @var bool
     */
    public bool $isThreeD = false;

    /**
     * @var array
     */
    public array $params = [];

    /**
     * @var mixed
     */
    public $client;

    /**
     * @var array
     */
    public array $config;

    /**
     * @var string
     */
    public string $successUrl,$failUrl;

    /**
     * PaymentGateway constructor.
     * @param Application $application
     * @param array $config
     */
    public function __construct(Application $application,array $config)
    {
        $this->config = $config;
    }

    /**
     * @param bool $use
     * @return PaymentGateway
     */
    public function useThreeD(bool $use = true): PaymentGateway
    {
        $this->isThreeD = $use;

        return $this;
    }

    /**
     * @param array $params
     * @return PaymentGateway
     */
    public function prepare(array $params): PaymentGateway
    {
        $this->params = $params;

        return $this;
    }
    /**
     * @param string $url
     * @return $this
     */
    public function setSuccessUrl(string $url): PaymentGateway
    {
        $this->successUrl = $url;

        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setFailUrl(string $url): PaymentGateway
    {
        $this->failUrl = $url;

        return $this;
    }

    /**
     * Do Payment
     *
     * @return mixed
     */
    abstract public function payment();

    /**
     * @return mixed
     */
    abstract public function paymentThreeDFallback();

}
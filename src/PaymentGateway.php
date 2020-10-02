<?php


namespace KumsalAgency\Payment;



use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

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
    public string $successUrl,$failUrl,$orderID;

    /**
     * @var float
     */
    public float $amount;

    /**
     * @var int
     */
    public int $installmentCount;

    /**
     * @var string
     */
    public string $cardNumber;

    /**
     * @var int
     */
    public int $cardExpireDateMonth;

    /**
     * @var int
     */
    public int $cardExpireDateYear;

    /**
     * @var string
     */
    public string $cardCVV2;

    /**
     * @var string
     */
    public string $cardHolderName;

    /**
     * @var string
     */
    public ?string $cardType;

    /**
     * @var string
     */
    public string $environment = 'production';

    /**
     * PaymentGateway constructor.
     * @param Application $application
     * @param array $config
     */
    public function __construct(Application $application,array $config)
    {
        $this->config = $config;

        $this->environment = $this->config['environment'] ?? 'production';
    }

    /**
     * @param bool $use
     * @return $this
     */
    public function useThreeD(bool $use = true): PaymentGateway
    {
        return tap($this, function ($payment) use ($use) {
            return $this->isThreeD = $use;
        });
    }

    /**
     * @param array $params
     * @return $this
     */
    public function prepare(array $params): PaymentGateway
    {
        return tap($this, function ($payment) use ($params) {
            return $this->params = $params;
        });
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setSuccessUrl(string $url): PaymentGateway
    {
        return tap($this, function ($payment) use ($url) {
            return $this->successUrl = $url;
        });
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setFailUrl(string $url): PaymentGateway
    {
        return tap($this, function ($payment) use ($url) {
            return $this->failUrl = $url;
        });
    }

    /**
     * @param float $amount
     * @return $this
     */
    public function setAmount(float $amount): PaymentGateway
    {
        return tap($this, function ($payment) use ($amount) {
            return $this->amount = $amount;
        });
    }

    /**
     * @param string $orderID
     * @return $this
     */
    public function setOrderID(string $orderID): PaymentGateway
    {
        return tap($this, function ($payment) use ($orderID) {
            return $this->orderID = $orderID;
        });
    }

    /**
     * @param int $installmentCount
     * @return $this
     */
    public function setInstallmentCount(int $installmentCount): PaymentGateway
    {
        return tap($this, function ($payment) use ($installmentCount) {
            return $this->installmentCount = $installmentCount;
        });
    }

    /**
     * @param string $cardHolderName
     * @return $this
     */
    public function setCardHolderName(string $cardHolderName): PaymentGateway
    {
        return tap($this, function ($payment) use ($cardHolderName) {
            return $this->cardHolderName = $cardHolderName;
        });
    }

    /**
     * @param string $cardNumber
     * @return $this
     */
    public function setCardNumber(string $cardNumber): PaymentGateway
    {
        return tap($this, function ($payment) use ($cardNumber) {
            return $this->cardNumber = $cardNumber;
        });
    }

    /**
     * @param int $cardExpireDateMonth
     * @return $this
     */
    public function setCardExpireDateMonth(int $cardExpireDateMonth): PaymentGateway
    {
        return tap($this, function ($payment) use ($cardExpireDateMonth) {
            return $this->cardExpireDateMonth = $cardExpireDateMonth;
        });
    }

    /**
     * @param int $cardExpireDateYear
     * @return $this
     */
    public function setCardExpireDateYear(int $cardExpireDateYear): PaymentGateway
    {
        return tap($this, function ($payment) use ($cardExpireDateYear) {
            return $this->cardExpireDateYear = $cardExpireDateYear;
        });
    }

    /**
     * @param string $cardCVV2
     * @return $this
     */
    public function setCardCVV2(string $cardCVV2): PaymentGateway
    {
        return tap($this, function ($payment) use ($cardCVV2) {
            return $this->cardCVV2 = $cardCVV2;
        });
    }

    /**
     * @param string $cardType
     * @return $this
     */
    public function setCardType(string $cardType): PaymentGateway
    {
        return tap($this, function ($payment) use ($cardType) {
            return $this->cardType = $cardType;
        });
    }

    /**
     * @param string $environment
     * @return $this
     */
    public function setEnvironment(string $environment): PaymentGateway
    {
        return tap($this, function ($payment) use ($environment) {
            return $this->environment = $environment;
        });
    }

    /**
     * Do Payment
     *
     * @return mixed
     */
    abstract public function payment();

    /**
     * @param Request $request
     * @return PaymentResponse
     */
    abstract public function paymentThreeDFallback(Request $request): PaymentResponse;

}
<?php


namespace KumsalAgency\Payment;

use InvalidArgumentException;

use KumsalAgency\Payment\PaymentGateway;

class Payment
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * The array of resolved gateways.
     *
     * @var array
     */
    protected $gateways = [];

    /**
     * The registered custom driver creators.
     *
     * @var array
     */
    protected $customCreators = [];

    /**
     * Create a new Payment instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Get a filesystem instance.
     *
     * @param  string|null  $name
     * @return PaymentGateway
     */
    public function gateway($name = null)
    {
        $name = $name ?: $this->getDefaultDriver();

        return $this->gateways[$name] = $this->get($name);
    }

    /**
     * Attempt to get the gateway from the local cache.
     *
     * @param  string  $name
     * @return PaymentGateway
     */
    protected function get($name)
    {
        return $this->gateways[$name] ?? $this->resolve($name);
    }

    /**
     * Resolve the given gateway.
     *
     * @param  string  $name
     * @return PaymentGateway
     *
     * @throws \InvalidArgumentException
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        if (empty($config)) {
            throw new InvalidArgumentException("Gateway [{$name}] is not defined.");
        }

        if (isset($this->customCreators[$name])) {
            return $this->callCustomCreator($name,$config);
        } else {
            throw new InvalidArgumentException("Gateway [{$name}] is not exists.");
        }
    }

    /**
     * Call a custom driver creator.
     *
     * @param string $name
     * @param  array  $config
     * @return PaymentGateway
     */
    protected function callCustomCreator(string $name,array $config)
    {
        $driver = $this->customCreators[$name]($this->app, $config);

        if (!($driver instanceof PaymentGateway)) {
            throw new InvalidArgumentException("Gateway [{$name}] not supported.");
        }

        return $driver;
    }

    /**
     * Get the payment gateway configuration.
     *
     * @param  string  $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["payment.gateways.{$name}"] ?: [];
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['payment.default'];
    }

    /**
     * Set the given gateway instance.
     *
     * @param  string  $name
     * @param  mixed  $gateway
     * @return $this
     */
    public function set($name, $gateway)
    {
        $this->gateways[$name] = $gateway;

        return $this;
    }

    /**
     * Register a custom transport creator Closure.
     *
     * @param  string  $driver
     * @param  \Closure  $callback
     * @return $this
     */
    public function extend($driver, \Closure $callback)
    {
        $this->customCreators[$driver] = $callback;

        return $this;
    }

    /**
     * Dynamically call the default driver instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->gateway()->$method(...$parameters);
    }
}
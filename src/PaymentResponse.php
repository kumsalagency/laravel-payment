<?php


namespace KumsalAgency\Payment;


abstract class PaymentResponse
{
    /**
     * The underlying PSR response.
     *
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * The decoded response.
     *
     * @var array
     */
    protected $decoded;

    /**
     * Create a new response instance.
     *
     * @param mixed $response
     * @return void
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Get the JSON decoded body of the response as an array or scalar value.
     *
     * @return mixed
     */
    public function json()
    {
        if (! $this->decoded) {
            $this->decoded = json_decode($this->response, true);
        }

        return $this->decoded;
    }

    /**
     * Get the XML decoded body of the response as an array or scalar value.
     *
     * @return mixed
     */
    public function xml()
    {
        try
        {
            if (! $this->decoded) {
                $this->response = json_encode(simplexml_load_string($this->response));

                $this->json();
            }
        }
        catch (\Exception $exception){
            $this->decoded = [];
        }

        return $this->decoded;
    }

    /**
     * Get response raw
     *
     * @return mixed
     */
    public function getResponseRaw()
    {
        return $this->response;
    }

    /**
     * Get message
     *
     * @return string
     */
    abstract public function getMessage();

    /**
     * Get code
     *
     * @return string
     */
    abstract public function getCode();

    /**
     * Get ID
     *
     * @return string
     */
    abstract public function getID();
}
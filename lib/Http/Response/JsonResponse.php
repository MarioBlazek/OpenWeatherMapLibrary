<?php

namespace Marek\OpenWeatherLibrary\Http\Response;

class JsonResponse implements ResponseInterface
{
    /**
     * @var array|string
     */
    protected $data;

    /**
     * @var int
     */
    protected $httpCode;

    /**
     * Response constructor.
     *
     * @param string $data
     * @param int $httpCode
     */
    public function __construct($data, $httpCode)
    {
        if ($this->isValidJson($data)) {
            $data = json_decode($data, true);
        }

        $this->data = $data;
        $this->httpCode = $httpCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusCode()
    {
        if (is_array($this->data) && array_key_exists('cod', $this->data)) {
            $this->httpCode = (int)$this->data['cod'];
        }

        return $this->httpCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function isOk()
    {
        if ($this->getStatusCode() === ResponseInterface::HTTP_SUCCESS) {
            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function isAuthorized()
    {
        if ($this->getStatusCode() !== ResponseInterface::HTTP_ERROR) {
            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        if (is_array($this->data) && array_key_exists('message', $this->data)) {
            return $this->data['message'];
        }

        return '';
    }

    /**
     * Returns data represented as string.
     *
     * @return string
     */
    public function __toString()
    {
        if (is_array($this->data)) {
            return json_encode($this->data);
        }

        return (string)$this->data;
    }

    /**
     * Checks if given string is valid json.
     *
     * @param string $string
     *
     * @return bool
     */
    protected function isValidJson($string)
    {
        json_decode($string);

        return json_last_error() === JSON_ERROR_NONE;
    }
}

<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Exception;

use Exception;

abstract class APIException extends Exception
{
    public const BAD_REQUEST = 400;

    public const FORBIDDEN = 403;

    public const NOT_FOUND = 404;

    public const UNAUTHORIZED = 401;

    /**
     * Status code returned from API.
     *
     * @var int
     */
    protected $statusCode;

    /**
     * APIException constructor.
     *
     * @param string $message
     * @param int $statusCode
     */
    public function __construct($message, $statusCode)
    {
        parent::__construct($message);
        $this->statusCode = $statusCode;
    }

    /**
     * Returns error message received from API.
     *
     * @return string
     */
    public function getAPIMessage()
    {
        return $this->getMessage();
    }

    /**
     * API status code.
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}

<?php

namespace Marek\OpenWeatherMap\API\Exception;

use Exception;

abstract class APIException extends Exception
{
    /**
     * Returns error message received from API
     *
     * @return string
     */
    public function getAPIMessage()
    {
        return $this->getMessage();
    }
}

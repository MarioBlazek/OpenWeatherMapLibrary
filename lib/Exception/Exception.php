<?php

namespace Marek\OpenWeatherMap\Exception;

use Exception as BaseException;

abstract class Exception extends BaseException
{
    /**
     * {@inheritdoc}
     */
    public function __construct($message)
    {
        parent::__construct($message, null, null);
    }
}

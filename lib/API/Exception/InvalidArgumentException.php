<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Exception;

use Exception;

class InvalidArgumentException extends Exception
{
    public function __construct(string $value, string $property, string $class)
    {
        $message = "Invalid value {$value} for property {$property} on class {$class}";
        parent::__construct($message);
    }
}

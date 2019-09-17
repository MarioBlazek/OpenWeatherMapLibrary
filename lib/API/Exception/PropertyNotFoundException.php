<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Exception;

use Exception;

class PropertyNotFoundException extends Exception
{
    public function __construct($property, $class)
    {
        $message = "Cannot find property {$property} on class {$class}";
        parent::__construct($message, null, null);
    }
}

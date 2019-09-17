<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Response\AirPollution;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;

class Base extends APIResponse
{
    /**
     * @var \DateTime
     */
    public $time;

    /**
     * @var GeographicCoordinates
     */
    public $location;
}

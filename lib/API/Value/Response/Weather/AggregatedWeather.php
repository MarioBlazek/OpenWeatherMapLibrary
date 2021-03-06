<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Response\Weather;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;

class AggregatedWeather extends APIResponse
{
    /**
     * @var int
     */
    public $count;

    /**
     * @var Weather[]
     */
    public $weathers;
}

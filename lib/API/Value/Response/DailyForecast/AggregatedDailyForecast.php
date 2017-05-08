<?php

namespace Marek\OpenWeatherMap\API\Value\Response\DailyForecast;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\City;

class AggregatedDailyForecast extends APIResponse
{
    /**
     * @var City
     */
    public $city;

    /**
     * @var int
     */
    public $count;

    /**
     * @var DailyForecast[]
     */
    public $list;
}

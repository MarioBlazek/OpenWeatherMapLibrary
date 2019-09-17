<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Response\DailyForecast;

use Marek\OpenWeatherMap\API\Value\Response\Temperature;
use Marek\OpenWeatherMap\API\Value\Response\WeatherValue;

class DailyForecast
{
    public $dt;

    /**
     * @var Temperature
     */
    public $temp;

    /**
     * @var float
     */
    public $pressure;

    /**
     * @var int
     */
    public $humidity;

    /**
     * @var float
     */
    public $speed;

    /**
     * @var int
     */
    public $deg;

    /**
     * @var int
     */
    public $clouds;

    /**
     * @var float
     */
    public $rain;

    /**
     * @var WeatherValue[]
     */
    public $weather;
}

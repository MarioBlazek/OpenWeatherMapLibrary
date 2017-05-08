<?php

namespace Marek\OpenWeatherMap\API\Value\Response\Weather;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\Clouds;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\Main;
use Marek\OpenWeatherMap\API\Value\Response\Rain;
use Marek\OpenWeatherMap\API\Value\Response\Snow;
use Marek\OpenWeatherMap\API\Value\Response\Sys;
use Marek\OpenWeatherMap\API\Value\Response\Weather\Weather as WeatherValue;
use Marek\OpenWeatherMap\API\Value\Response\Wind;

class Weather extends APIResponse
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var GeographicCoordinates
     */
    public $coord;

    /**
     * @var WeatherValue[]
     */
    public $weather;

    /**
     * @var Main
     */
    public $main;

    /**
     * @var int
     */
    public $visibility;

    /**
     * @var Wind
     */
    public $wind;

    /**
     * @var Clouds
     */
    public $clouds;

    /**
     * @var Rain
     */
    public $rain;

    /**
     * @var Snow
     */
    public $snow;

    /**
     * @var Sys
     */
    public $sys;

    /**
     * @var \DateTime
     */
    public $dt;
}

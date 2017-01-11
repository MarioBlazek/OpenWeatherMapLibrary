<?php

namespace Marek\OpenWeatherLibrary\API\Value\Response;

use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather\Clouds;
use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather\Coord;
use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather\Main;
use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather\Rain;
use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather\Snow;
use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather\Sys;
use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather\Weather;
use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather\Wind;

class CurrentWeather
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
     * @var Coord
     */
    public $coord;

    /**
     * @var int
     */
    public $visibility;

    /**
     * @var Weather[]
     */
    public $weather;

    /**
     * @var Main
     */
    public $main;

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
     * @var \DateTime
     */
    public $dt;

    /**
     * @var Sys
     */
    public $sys;
}

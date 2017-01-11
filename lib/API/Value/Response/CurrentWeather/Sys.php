<?php

namespace Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather;

use DateTime;

class Sys
{
    /**
     * @var int
     */
    public $type;

    /**
     * @var int
     */
    public $id;

    /**
     * @var float
     */
    public $message;

    /**
     * @var string
     */
    public $country;

    /**
     * @var DateTime
     */
    public $sunrise;

    /**
     * @var DateTime
     */
    public $sunset;
}

<?php

namespace Marek\OpenWeatherLibrary\API\Value\Response\AirPollution;

class Data
{
    public $value;

    public $pressure;

    public $precision;

    public function __construct($value, $pressure, $precision)
    {

    }
}

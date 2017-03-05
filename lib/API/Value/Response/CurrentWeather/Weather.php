<?php

namespace Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather;

class Weather
{
    public $weathers;

    public function add(\Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather\Weather\Weather $weather)
    {
        $this->weathers[] = $weather;
    }
}

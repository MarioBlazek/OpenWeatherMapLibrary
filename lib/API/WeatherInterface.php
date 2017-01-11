<?php

namespace Marek\OpenWeatherLibrary\API;

use Marek\OpenWeatherLibrary\API\Services\CurrentWeather;

interface WeatherInterface
{
    /**
     * @return CurrentWeather
     */
    public function getCurrentWeatherService();
}

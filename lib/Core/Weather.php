<?php

namespace Marek\OpenWeatherLibrary\Core;

use Marek\OpenWeatherLibrary\API\WeatherInterface;
use Marek\OpenWeatherLibrary\Core\Services\CurrentWeatherService;

class Weather implements WeatherInterface
{
    /**
     * @var CurrentWeatherService
     */
    protected $currentWeatherService;

    public function __construct(
        CurrentWeatherService $currentWeatherService
    ) {
    
        $this->currentWeatherService = $currentWeatherService;
    }
    /**
     * @inheritdoc
     */
    public function getCurrentWeatherService()
    {
        return $this->currentWeatherService;
    }
}

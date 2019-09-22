<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Weather;

use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;

interface WeatherServicesInterface
{
    /**
     * @return \Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface
     */
    public function getWeatherService(): WeatherInterface;

    /**
     * @return \Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface
     */
    public function getAirPollutionService(): AirPollutionInterface;

    /**
     * @return \Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface
     */
    public function getUltravioletIndexService(): UltravioletIndexInterface;

    /**
     * @return \Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface
     */
    public function getHourForecastService(): HourForecastInterface;
}

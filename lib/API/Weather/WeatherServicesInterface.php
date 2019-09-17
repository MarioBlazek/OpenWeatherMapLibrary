<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Weather;

use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;
use Marek\OpenWeatherMap\API\Weather\Services\DailyForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;

interface WeatherServicesInterface
{
    /**
     * @return WeatherInterface
     */
    public function getWeatherService();

    /**
     * @return AirPollutionInterface
     */
    public function getAirPollutionService();

    /**
     * @return UltravioletIndexInterface
     */
    public function getUltravioletIndexService();

    /**
     * @return HourForecastInterface
     */
    public function getHourForecastService();

    /**
     * @return DailyForecastInterface
     */
    public function getDailyForecastService();
}

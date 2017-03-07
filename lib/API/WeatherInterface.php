<?php

namespace Marek\OpenWeatherLibrary\API;

interface WeatherInterface
{
    /**
     * @return \Marek\OpenWeatherLibrary\API\Services\CurrentWeather
     */
    public function getCurrentWeatherService();

    /**
     * @return \Marek\OpenWeatherLibrary\API\Services\AirPollution
     */
    public function getAirPullutionService();

    /**
     * @return \Marek\OpenWeatherLibrary\API\Services\DailyForecast
     */
    public function getDailyForecastService();

    /**
     * @return \Marek\OpenWeatherLibrary\API\Services\HourForecast
     */
    public function getHourForecastService();

    /**
     * @return \Marek\OpenWeatherLibrary\API\Services\UltravioletIndex
     */
    public function getUltravioletIndexService();

    /**
     * @return \Marek\OpenWeatherLibrary\API\Services\WeatherStations
     */
    public function getWeatherStationsService();
}

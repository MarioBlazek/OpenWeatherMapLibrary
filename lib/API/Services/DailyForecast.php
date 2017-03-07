<?php

namespace Marek\OpenWeatherLibrary\API\Services;

use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\Response\Response;

interface DailyForecast
{
    /**
     * Base URL for daily forecast.
     */
    const BASE_URL = 'http://api.openweathermap.org/data/2.5';

    /**
     * Call 16 day / daily forecast data by city name.
     *
     * @param CityName $cityName
     * @param int $numberOfDays
     *
     * @return Response
     */
    public function fetchForecastByCityName(CityName $cityName, $numberOfDays = 16);

    /**
     * Call 16 day / daily forecast data by city id.
     *
     * @param int $cityId
     * @param int $numberOfDays
     *
     * @return Response
     */
    public function fetchForecastByCityId($cityId, $numberOfDays = 16);

    /**
     * Call 16 day / daily forecast data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param int $numberOfDays
     *
     * @return Response
     */
    public function fetchForecastByCityGeographicCoordinates(GeographicCoordinates $coordinates, $numberOfDays = 16);
}

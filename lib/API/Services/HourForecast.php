<?php

namespace Marek\OpenWeatherLibrary\API\Services;

use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\Response\Response;

interface HourForecast
{
    /**
     * Base URL for hour forecast.
     */
    const BASE_URL = 'http://api.openweathermap.org/data/2.5';

    /**
     * Call 5 day / 3 hour forecast data by city name.
     *
     * @param CityName $cityName
     *
     * @return Response
     */
    public function fetchForecastByCityName(CityName $cityName);

    /**
     * Call 5 day / 3 hour forecast data by city id.
     *
     * @param int $cityId
     *
     * @return Response
     */
    public function fetchForecastByCityId($cityId);

    /**
     * Call 5 day / 3 hour forecast data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     *
     * @return Response
     */
    public function fetchForecastByCityGeographicCoordinates(GeographicCoordinates $coordinates);
}

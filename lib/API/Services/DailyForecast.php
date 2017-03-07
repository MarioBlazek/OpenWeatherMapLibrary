<?php

namespace Marek\OpenWeatherLibrary\API\Services;

use Marek\OpenWeatherLibrary\API\Value\CityId;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\DaysCount;
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
     * @param DaysCount $numberOfDays
     *
     * @return Response
     */
    public function fetchForecastByCityName(CityName $cityName, DaysCount $numberOfDays);

    /**
     * Call 16 day / daily forecast data by city id.
     *
     * @param CityId $cityId
     * @param DaysCount $numberOfDays
     *
     * @return Response
     */
    public function fetchForecastByCityId(CityId $cityId, DaysCount $numberOfDays);

    /**
     * Call 16 day / daily forecast data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param DaysCount $numberOfDays
     *
     * @return Response
     */
    public function fetchForecastByCityGeographicCoordinates(GeographicCoordinates $coordinates, DaysCount $numberOfDays);
}

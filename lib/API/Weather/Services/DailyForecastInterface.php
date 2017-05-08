<?php

namespace Marek\OpenWeatherMap\API\Weather\Services;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Response\DailyForecast\AggregatedDailyForecast;
use Marek\OpenWeatherMap\API\Exception\APIException;

interface DailyForecastInterface
{
    /**
     * Base URL for daily forecast.
     */
    const BASE_URL = 'http://api.openweathermap.org/data/2.5/forecast/daily';

    /**
     * Call 16 day / daily forecast data by city name.
     *
     * @param CityName $cityName
     * @param DaysCount $numberOfDays
     *
     * @return AggregatedDailyForecast
     *
     * @throws APIException
     */
    public function fetchForecastByCityName(CityName $cityName, DaysCount $numberOfDays);

    /**
     * Call 16 day / daily forecast data by city id.
     *
     * @param CityId $cityId
     * @param DaysCount $numberOfDays
     *
     * @return AggregatedDailyForecast
     *
     * @throws APIException
     */
    public function fetchForecastByCityId(CityId $cityId, DaysCount $numberOfDays);

    /**
     * Call 16 day / daily forecast data by zip code.
     *
     * @param ZipCode $zipCode
     * @param DaysCount $numberOfDays
     *
     * @return AggregatedDailyForecast
     *
     * @throws APIException
     */
    public function fetchForecastByZipCode(ZipCode $zipCode, DaysCount $numberOfDays);

    /**
     * Call 16 day / daily forecast data by geographic coordinates.
     *
     * @param Latitude $latitude
     * @param Longitude $longitude
     * @param DaysCount $numberOfDays
     *
     * @return AggregatedDailyForecast
     */
    public function fetchForecastByCityGeographicCoordinates(Latitude $latitude, Longitude $longitude, DaysCount $numberOfDays);
}

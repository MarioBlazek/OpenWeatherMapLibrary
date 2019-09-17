<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Weather\Services;

use Marek\OpenWeatherMap\API\Exception\APIException;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Response\HourForecast\AggregatedHourForecast;

interface HourForecastInterface
{
    /**
     * Base URL for hour forecast.
     */
    public const BASE_URL = 'http://api.openweathermap.org/data/2.5/forecast';

    /**
     * Call 5 day / 3 hour forecast data by city name.
     *
     * @param CityName $cityName
     *
     * @throws APIException
     *
     * @return AggregatedHourForecast
     */
    public function fetchForecastByCityName(CityName $cityName);

    /**
     * Call 5 day / 3 hour forecast data by city id.
     *
     * @param CityId $cityId
     *
     * @throws APIException
     *
     * @return AggregatedHourForecast
     */
    public function fetchForecastByCityId(CityId $cityId);

    /**
     * Call 5 day / 3 hour forecast data by zip code.
     *
     * @param ZipCode $zipCode
     *
     * @throws APIException
     *
     * @return AggregatedHourForecast
     */
    public function fetchForecastByZipCode(ZipCode $zipCode);

    /**
     * Call 5 day / 3 hour forecast data by geographic coordinates.
     *
     * @param Latitude $latitude
     * @param Longitude $longitude
     *
     * @return AggregatedHourForecast
     */
    public function fetchForecastByCityGeographicCoordinates(Latitude $latitude, Longitude $longitude);
}

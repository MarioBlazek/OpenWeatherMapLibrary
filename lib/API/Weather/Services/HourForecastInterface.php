<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Weather\Services;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
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
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName $cityName
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\HourForecast\AggregatedHourForecast
     */
    public function fetchForecastByCityName(CityName $cityName): AggregatedHourForecast;

    /**
     * Call 5 day / 3 hour forecast data by city id.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId $cityId
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\HourForecast\AggregatedHourForecast
     */
    public function fetchForecastByCityId(CityId $cityId): AggregatedHourForecast;

    /**
     * Call 5 day / 3 hour forecast data by zip code.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode $zipCode
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\HourForecast\AggregatedHourForecast
     */
    public function fetchForecastByZipCode(ZipCode $zipCode): AggregatedHourForecast;

    /**
     * Call 5 day / 3 hour forecast data by geographic coordinates.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates $coordinates
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\HourForecast\AggregatedHourForecast
     */
    public function fetchForecastByCityGeographicCoordinates(GeographicCoordinates $coordinates): AggregatedHourForecast;
}

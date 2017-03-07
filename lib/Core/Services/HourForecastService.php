<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\HourForecast;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\Core\BaseService;

class HourForecastService extends BaseService implements HourForecast
{
    /**
     * @inheritdoc
     */
    public function fetchForecastByCityName(CityName $cityName)
    {
        // TODO: Implement fetchForecastByCityName() method.
    }

    /**
     * @inheritdoc
     */
    public function fetchForecastByCityId($cityId)
    {
        // TODO: Implement fetchForecastByCityId() method.
    }

    /**
     * @inheritdoc
     */
    public function fetchForecastByCityGeographicCoordinates(GeographicCoordinates $coordinates)
    {
        // TODO: Implement fetchForecastByCityGeographicCoordinates() method.
    }
}

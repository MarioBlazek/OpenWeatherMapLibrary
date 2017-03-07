<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\DailyForecast;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\Core\BaseService;

class DailyForecastService extends BaseService implements DailyForecast
{
    /**
     * @inheritdoc
     */
    public function fetchForecastByCityName(CityName $cityName, $numberOfDays = 16)
    {
        // TODO: Implement fetchForecastByCityName() method.
    }

    /**
     * @inheritdoc
     */
    public function fetchForecastByCityId($cityId, $numberOfDays = 16)
    {
        // TODO: Implement fetchForecastByCityId() method.
    }

    /**
     * @inheritdoc
     */
    public function fetchForecastByCityGeographicCoordinates(GeographicCoordinates $coordinates, $numberOfDays = 16)
    {
        // TODO: Implement fetchForecastByCityGeographicCoordinates() method.
    }
}

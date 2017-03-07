<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\AirPollution;
use Marek\OpenWeatherLibrary\API\Value\Datetime;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\Core\BaseService;

class AirPollutionService extends BaseService implements AirPollution
{
    /**
     * @inheritdoc
     */
    public function fetchOzoneData(GeographicCoordinates $coordinates, Datetime $datetime)
    {
        // TODO: Implement fetchOzoneData() method.
    }

    /**
     * @inheritdoc
     */
    public function fetchCarbonMonoxideData(GeographicCoordinates $coordinates, Datetime $datetime)
    {
        // TODO: Implement fetchCarbonMonoxideData() method.
    }
}

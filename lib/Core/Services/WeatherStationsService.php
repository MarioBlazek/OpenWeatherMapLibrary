<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\WeatherStations;
use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\Core\BaseService;

class WeatherStationsService extends BaseService implements WeatherStations
{
    /**
     * @inheritdoc
     */
    public function fetchFromOnStationById($stationId)
    {
        // TODO: Implement fetchFromOnStationById() method.
    }

    /**
     * @inheritdoc
     */
    public function fetchFromSeveralByRectangleZone(BoundingBox $boundingBox, $cluster = 'yes', $numberOfStations = 10)
    {
        // TODO: Implement fetchFromSeveralByRectangleZone() method.
    }

    /**
     * @inheritdoc
     */
    public function fetchFromSeveralByGeoPoint(GeographicCoordinates $coordinates, $numberOfStations = 10)
    {
        // TODO: Implement fetchFromSeveralByGeoPoint() method.
    }
}

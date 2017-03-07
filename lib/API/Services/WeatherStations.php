<?php

namespace Marek\OpenWeatherLibrary\API\Services;

use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\Cluster;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\Response\Response;

interface WeatherStations
{
    /**
     * Base URL for weather stations.
     */
    const BASE_URL = 'http://api.openweathermap.org/data/2.5';

    /**
     * Call current weather from one station.
     *
     * @param int $stationId
     *
     * @return Response
     */
    public function fetchFromOnStationById($stationId);

    /**
     * Call current weather from several stations by rectangle zone.
     *
     * @param BoundingBox $boundingBox
     * @param Cluster $cluster
     * @param int $numberOfStations
     *
     * @return Response
     */
    public function fetchFromSeveralByRectangleZone(BoundingBox $boundingBox, Cluster $cluster, $numberOfStations = 10);

    /**
     * Call current weather from several stations by geo point.
     *
     * @param GeographicCoordinates $coordinates
     * @param int $numberOfStations
     *
     * @return Response
     */
    public function fetchFromSeveralByGeoPoint(GeographicCoordinates $coordinates, $numberOfStations = 10);
}

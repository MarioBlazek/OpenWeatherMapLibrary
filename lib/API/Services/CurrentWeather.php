<?php

namespace Marek\OpenWeatherLibrary\API\Services;

use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\Response\Response;
use Marek\OpenWeatherLibrary\API\Value\ZipCode;

interface CurrentWeather
{
    /**
     * @param CityName $cityName
     *
     * @return Response
     */
    public function byCityName(CityName $cityName);

    /**
     * @param int $cityId
     *
     * @return Response
     */
    public function byCityId($cityId);

    /**
     * @param GeographicCoordinates $coordinates
     *
     * @return Response
     */
    public function byGeographicCoordinates(GeographicCoordinates $coordinates);

    /**
     * @param ZipCode $zipCode
     *
     * @return Response
     */
    public function byZipCode(ZipCode $zipCode);

    /**
     * @param BoundingBox $bbox
     * @param string $cluster
     *
     * @return mixed
     */
    public function withinARectangleZone(BoundingBox $bbox, $cluster = 'yes');

    /**
     * @param GeographicCoordinates $coordinates
     * @param string $cluster
     * @param int $cnt
     *
     * @return Response
     */
    public function inCycle(GeographicCoordinates $coordinates, $cluster = 'yes', $cnt = 10);

    /**
     * @param array $cityIds
     *
     * @return Response
     */
    public function severalCityIds(array $cityIds);
}

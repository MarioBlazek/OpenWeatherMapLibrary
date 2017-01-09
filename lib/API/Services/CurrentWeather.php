<?php

namespace Marek\OpenWeatherLibrary\API\Services;

use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\ZipCode;

interface CurrentWeather
{
    /**
     * @param CityName $cityName
     *
     * @return mixed
     */
    public function byCityName(CityName $cityName);

    /**
     * @param int $cityId
     *
     * @return mixed
     */
    public function byCityId($cityId);

    /**
     * @param GeographicCoordinates $coordinates
     *
     * @return mixed
     */
    public function byGeographicCoordinates(GeographicCoordinates $coordinates);

    /**
     * @param ZipCode $zipCode
     *
     * @return mixed
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
     * @return mixed
     */
    public function inCycle(GeographicCoordinates $coordinates, $cluster = 'yes', $cnt = 10);

    /**
     * @param array $cityIds
     *
     * @return mixed
     */
    public function severalCityIds(array $cityIds);
}

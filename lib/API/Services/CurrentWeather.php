<?php

namespace Marek\OpenWeatherLibrary\API\Services;

use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;

interface CurrentWeather
{
    /**
     * @param string $cityName
     * @param string|null $countryCode
     *
     * @return mixed
     */
    public function byCityName($cityName, $countryCode = null);

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
     * @param int $zipCode
     * @param string $countryCode
     *
     * @return mixed
     */
    public function byZipCode($zipCode, $countryCode);

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

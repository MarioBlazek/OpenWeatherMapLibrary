<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\CurrentWeather;
use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;

class CurrentWeatherService implements CurrentWeather
{
    /**
     * @param string $cityName
     * @param string|null $countryCode
     *
     * @return mixed
     */
    public function byCityName($cityName, $countryCode = null)
    {
        // TODO: Implement byCityName() method.
    }

    /**
     * @param int $cityId
     *
     * @return mixed
     */
    public function byCityId($cityId)
    {
        // TODO: Implement byCityId() method.
    }

    /**
     * @param GeographicCoordinates $coordinates
     *
     * @return mixed
     */
    public function byGeographicCoordinates(GeographicCoordinates $coordinates)
    {
        // TODO: Implement byGeographicCoordinates() method.
    }

    /**
     * @param int $zipCode
     * @param string $countryCode
     *
     * @return mixed
     */
    public function byZipCode($zipCode, $countryCode)
    {
        // TODO: Implement byZipCode() method.
    }

    /**
     * @param BoundingBox $bbox
     * @param string $cluster
     *
     * @return mixed
     */
    public function withinARectangleZone(BoundingBox $bbox, $cluster = 'yes')
    {
        // TODO: Implement withinARectangleZone() method.
    }

    /**
     * @param GeographicCoordinates $coordinates
     * @param string $cluster
     * @param int $cnt
     *
     * @return mixed
     */
    public function inCycle(GeographicCoordinates $coordinates, $cluster = 'yes', $cnt = 10)
    {
        // TODO: Implement inCycle() method.
    }

    /**
     * @param array $cityIds
     *
     * @return mixed
     */
    public function severalCityIds(array $cityIds)
    {
        // TODO: Implement severalCityIds() method.
    }
}

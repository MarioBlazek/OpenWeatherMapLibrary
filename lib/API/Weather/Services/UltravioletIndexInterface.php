<?php

namespace Marek\OpenWeatherMap\API\Weather\Services;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;
use Marek\OpenWeatherMap\API\Exception\APIException;

interface UltravioletIndexInterface
{
    /**
     * Base URL for ultraviolet index.
     */
    const BASE_URL = 'http://api.openweathermap.org/v3/uvi/{location}/{datetime}.json';

    /**
     * Fetch Ultraviolet index by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param DateTime $datetime
     *
     * @return UltravioletIndex
     *
     * @throws APIException
     */
    public function fetchUltravioletIndex(GeographicCoordinates $coordinates, DateTime $datetime);
}

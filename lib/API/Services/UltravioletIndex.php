<?php

namespace Marek\OpenWeatherLibrary\API\Services;

use Marek\OpenWeatherLibrary\API\Value\Datetime;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\Response\Response;

interface UltravioletIndex
{
    /**
     * Base URL for ultraviolet index.
     */
    const BASE_URL = 'http://api.openweathermap.org/v3/uvi';

    /**
     * Fetch Ultraviolet index by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param Datetime $datetime
     *
     * @return Response
     */
    public function fetchUltravioletIndex(GeographicCoordinates $coordinates, Datetime $datetime);
}

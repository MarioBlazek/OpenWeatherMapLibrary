<?php

namespace Marek\OpenWeatherLibrary\API\Services;

use Marek\OpenWeatherLibrary\API\Value\Datetime;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\Response\Response;

interface AirPollution
{
    /**
     * Base URL for air pollution.
     */
    const BASE_URL = 'http://api.openweathermap.org/pollution/v1';

    /**
     * Fetch Ozone Data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param Datetime $datetime
     *
     * @return Response
     */
    public function fetchOzoneData(GeographicCoordinates $coordinates, Datetime $datetime);

    /**
     * Fetch Carbon Monoxide Data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param Datetime $datetime
     *
     * @return Response
     */
    public function fetchCarbonMonoxideData(GeographicCoordinates $coordinates, Datetime $datetime);

    /**
     * Fetch Sulfur Dioxide Data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param Datetime $datetime
     *
     * @return Response
     */
    public function fetchSulfurDioxideData(GeographicCoordinates $coordinates, Datetime $datetime);

    /**
     * Fetch Nitrogen Dioxide Data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param Datetime $datetime
     *
     * @return Response
     */
    public function fetchNitrogenDioxideData(GeographicCoordinates $coordinates, Datetime $datetime);
}

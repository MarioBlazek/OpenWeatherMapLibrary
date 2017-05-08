<?php

namespace Marek\OpenWeatherMap\API\Weather\Services;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Exception\APIException;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\CarbonMonoxide;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\NitrogenDioxide;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\Ozone;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\SulfurDioxide;

interface AirPollutionInterface
{
    /**
     * Carbon Monoxide Data (CO) URL
     */
    const URL_CARBON_MONOXIDE = 'http://api.openweathermap.org/pollution/v1/co/{location}/{datetime}.json';

    /**
     * Ozone Data (O3) URL
     */
    const URL_OZONE = 'http://api.openweathermap.org/pollution/v1/o3/{location}/{datetime}.json';

    /**
     * Sulfur Dioxide Data (SO2) URL
     */
    const URL_SULFUR_DIOXIDE = 'http://api.openweathermap.org/pollution/v1/so2/{location}/{datetime}.json';

    /**
     * Nitrogen Dioxide Data (NO2) URL
     */
    const URL_NITROGEN_DIOXIDE = 'http://api.openweathermap.org/pollution/v1/no2/{location}/{datetime}.json';

    /**
     * Fetch Ozone Data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param DateTime $datetime
     *
     * @return Ozone
     *
     * @throws APIException
     */
    public function fetchOzoneData(GeographicCoordinates $coordinates, DateTime $datetime);

    /**
     * Fetch Carbon Monoxide Data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param DateTime $datetime
     *
     * @return CarbonMonoxide
     */
    public function fetchCarbonMonoxideData(GeographicCoordinates $coordinates, DateTime $datetime);

    /**
     * Fetch Sulfur Dioxide Data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param DateTime $datetime
     *
     * @return SulfurDioxide
     *
     * @throws APIException
     */
    public function fetchSulfurDioxideData(GeographicCoordinates $coordinates, DateTime $datetime);

    /**
     * Fetch Nitrogen Dioxide Data by geographic coordinates.
     *
     * @param GeographicCoordinates $coordinates
     * @param DateTime $datetime
     *
     * @return NitrogenDioxide
     *
     * @throws APIException
     */
    public function fetchNitrogenDioxideData(GeographicCoordinates $coordinates, DateTime $datetime);
}
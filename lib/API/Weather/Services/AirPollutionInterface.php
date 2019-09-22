<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Weather\Services;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\CarbonMonoxide;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\NitrogenDioxide;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\Ozone;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\SulfurDioxide;

interface AirPollutionInterface
{
    /**
     * Carbon Monoxide Data (CO) URL.
     */
    public const URL_CARBON_MONOXIDE = 'http://api.openweathermap.org/pollution/v1/co/{location}/{datetime}.json';

    /**
     * Ozone Data (O3) URL.
     */
    public const URL_OZONE = 'http://api.openweathermap.org/pollution/v1/o3/{location}/{datetime}.json';

    /**
     * Sulfur Dioxide Data (SO2) URL.
     */
    public const URL_SULFUR_DIOXIDE = 'http://api.openweathermap.org/pollution/v1/so2/{location}/{datetime}.json';

    /**
     * Nitrogen Dioxide Data (NO2) URL.
     */
    public const URL_NITROGEN_DIOXIDE = 'http://api.openweathermap.org/pollution/v1/no2/{location}/{datetime}.json';

    /**
     * Fetch Ozone Data by geographic coordinates.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates $coordinates
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime $datetime
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\AirPollution\Ozone
     */
    public function fetchOzoneData(GeographicCoordinates $coordinates, DateTime $datetime): Ozone;

    /**
     * Fetch Carbon Monoxide Data by geographic coordinates.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates $coordinates
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime $datetime
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\AirPollution\CarbonMonoxide
     */
    public function fetchCarbonMonoxideData(GeographicCoordinates $coordinates, DateTime $datetime): CarbonMonoxide;

    /**
     * Fetch Sulfur Dioxide Data by geographic coordinates.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates $coordinates
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime $datetime
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\AirPollution\SulfurDioxide
     */
    public function fetchSulfurDioxideData(GeographicCoordinates $coordinates, DateTime $datetime): SulfurDioxide;

    /**
     * Fetch Nitrogen Dioxide Data by geographic coordinates.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates $coordinates
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime $datetime
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\AirPollution\NitrogenDioxide
     */
    public function fetchNitrogenDioxideData(GeographicCoordinates $coordinates, DateTime $datetime): NitrogenDioxide;
}

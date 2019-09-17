<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Weather\Services;

use Marek\OpenWeatherMap\API\Exception\APIException;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\BoundingBox;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityIds;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Response\Weather\AggregatedWeather;
use Marek\OpenWeatherMap\API\Value\Response\Weather\Weather;

interface WeatherInterface
{
    public const URL_WEATHER = 'http://api.openweathermap.org/data/2.5/weather';

    public const URL_BBOX = 'http://api.openweathermap.org/data/2.5/box/city';

    public const URL_CYCLE = 'http://api.openweathermap.org/data/2.5/find';

    public const URL_CITIES = 'http://api.openweathermap.org/data/2.5/group';

    /**
     * Call current weather data for one location by city name.
     *
     * @param CityName $cityName
     *
     * @throws APIException
     *
     * @return Weather
     */
    public function byCityName(CityName $cityName);

    /**
     * Call current weather data for one location by city id.
     *
     * @param CityId $cityId
     *
     * @throws APIException
     *
     * @return Weather
     */
    public function byCityId(CityId $cityId);

    /**
     * Call current weather data for one location by geographic coordinates.
     *
     * @param Latitude $latitude
     * @param Longitude $longitude
     *
     * @throws APIException
     *
     * @return Weather
     */
    public function byGeographicCoordinates(Latitude $latitude, Longitude $longitude);

    /**
     * Call current weather data for one location by zip code.
     *
     * @param ZipCode $zipCode
     *
     * @throws APIException
     *
     * @return Weather
     */
    public function byZipCode(ZipCode $zipCode);

    /**
     * Call current weather data for several cities within a rectangle zone.
     *
     * @param BoundingBox $bbox
     * @param Cluster $cluster
     *
     * @throws APIException
     *
     * @return AggregatedWeather
     */
    public function withinARectangleZone(BoundingBox $bbox, Cluster $cluster);

    /**
     * Call current weather data for several cities in cycle.
     *
     * @param Latitude $latitude
     * @param Longitude $longitude
     * @param Cluster $cluster
     * @param CityCount $cnt
     *
     * @throws APIException
     *
     * @return AggregatedWeather
     */
    public function inCycle(Latitude $latitude, Longitude $longitude, Cluster $cluster, CityCount $cnt);

    /**
     * Call current weather data for several cities by city IDs.
     *
     * @param CityIds $cityIds
     *
     * @throws APIException
     *
     * @return AggregatedWeather
     */
    public function severalCityIds(CityIds $cityIds);
}

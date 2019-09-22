<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Weather\Services;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\BoundingBox;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityIds;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
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
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName $cityName
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather
     */
    public function byCityName(CityName $cityName): Weather;

    /**
     * Call current weather data for one location by city id.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId $cityId
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather
     */
    public function byCityId(CityId $cityId): Weather;

    /**
     * Call current weather data for one location by geographic coordinates.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates $coordinates
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather
     */
    public function byGeographicCoordinates(GeographicCoordinates $coordinates): Weather;

    /**
     * Call current weather data for one location by zip code.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode $zipCode
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather
     */
    public function byZipCode(ZipCode $zipCode): Weather;

    /**
     * Call current weather data for several cities within a rectangle zone.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\BoundingBox $bbox
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster $cluster
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\Weather\AggregatedWeather
     */
    public function withinARectangleZone(BoundingBox $bbox, Cluster $cluster): AggregatedWeather;

    /**
     * Call current weather data for several cities in cycle.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates $coordinates
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster $cluster
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityCount $cnt
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\Weather\AggregatedWeather
     */
    public function inCycle(GeographicCoordinates $coordinates, Cluster $cluster, CityCount $cnt): AggregatedWeather;

    /**
     * Call current weather data for several cities by city IDs.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityIds $cityIds
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\Weather\AggregatedWeather
     */
    public function severalCityIds(CityIds $cityIds): AggregatedWeather;
}

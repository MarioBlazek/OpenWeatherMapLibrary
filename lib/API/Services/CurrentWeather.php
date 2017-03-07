<?php

namespace Marek\OpenWeatherLibrary\API\Services;

interface CurrentWeather
{
    /**
     * Base URL for current weather.
     */
    const BASE_URL = 'http://api.openweathermap.org/data/2.5';

    /**
     * Call current weather data for one location by city name.
     *
     * @param \Marek\OpenWeatherLibrary\API\Value\CityName $cityName
     *
     * @return \Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather
     */
    public function byCityName(\Marek\OpenWeatherLibrary\API\Value\CityName $cityName);

    /**
     * Call current weather data for one location by city id.
     *
     * @param \Marek\OpenWeatherLibrary\API\Value\CityId $cityId
     *
     * @return \Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather
     */
    public function byCityId(\Marek\OpenWeatherLibrary\API\Value\CityId $cityId);

    /**
     * Call current weather data for one location by geographic coordinates.
     *
     * @param \Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates $coordinates
     *
     * @return \Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather
     */
    public function byGeographicCoordinates(\Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates $coordinates);

    /**
     * Call current weather data for one location by zip code.
     *
     * @param \Marek\OpenWeatherLibrary\API\Value\ZipCode $zipCode
     *
     * @return \Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather
     */
    public function byZipCode(\Marek\OpenWeatherLibrary\API\Value\ZipCode $zipCode);

    /**
     * Call current weather data for several cities within a rectangle zone.
     *
     * @param \Marek\OpenWeatherLibrary\API\Value\BoundingBox $bbox
     * @param \Marek\OpenWeatherLibrary\API\Value\Cluster $cluster
     *
     * @return \Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather
     */
    public function withinARectangleZone(
        \Marek\OpenWeatherLibrary\API\Value\BoundingBox $bbox,
        \Marek\OpenWeatherLibrary\API\Value\Cluster $cluster
    );

    /**
     * Call current weather data for several cities in cycle.
     *
     * @param \Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates $coordinates
     * @param \Marek\OpenWeatherLibrary\API\Value\Cluster $cluster
     * @param \Marek\OpenWeatherLibrary\API\Value\CityCount $cnt
     *
     * @return \Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather
     */
    public function inCycle(
        \Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates $coordinates,
        \Marek\OpenWeatherLibrary\API\Value\Cluster $cluster,
        \Marek\OpenWeatherLibrary\API\Value\CityCount $cnt
    );

    /**
     * Call current weather data for several cities by city IDs.
     *
     * @param \Marek\OpenWeatherLibrary\API\Value\CityIds $cityIds
     *
     * @return \Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather
     */
    public function severalCityIds(\Marek\OpenWeatherLibrary\API\Value\CityIds $cityIds);
}

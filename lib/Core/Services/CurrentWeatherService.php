<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\CurrentWeather;
use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\Parameters\InputParameterBag;
use Marek\OpenWeatherLibrary\Factory\UrlFactory;
use Marek\OpenWeatherLibrary\Http\Client\HttpClientInterface;

class CurrentWeatherService implements CurrentWeather
{
    /**
     * @var HttpClientInterface
     */
    protected $client;
    
    /**
     * @var UrlFactory
     */
    protected $urlFactory;

    public function __construct(HttpClientInterface $client, UrlFactory $urlFactory)
    {
        $this->client = $client;
        $this->urlFactory = $urlFactory;
    }

    /**
     * @param CityName $cityName
     *
     * @return mixed
     */
    public function byCityName(CityName $cityName)
    {
        $params = new InputParameterBag('/weather');
        $params->setParameter('q', $cityName);

        $url = $this->urlFactory->build($params);

        $response = $this->client->get($url);

        var_dump($response);
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

<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\CurrentWeather;
use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\Parameters\InputParameterBag;
use Marek\OpenWeatherLibrary\API\Value\ZipCode;
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

    /**
     * @var InputParameterBag
     */
    protected $params;

    public function __construct(HttpClientInterface $client, UrlFactory $urlFactory)
    {
        $this->client = $client;
        $this->urlFactory = $urlFactory;
        $this->params = $this->urlFactory->buildBag('/weather');
    }

    /**
     * @param CityName $cityName
     *
     * @return mixed
     */
    public function byCityName(CityName $cityName)
    {
        $this->params->setParameter('q', $cityName);

        $url = $this->urlFactory->build($this->params);

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
        $this->params->setParameter('id', $cityId);

        $url = $this->urlFactory->build($this->params);

        $response = $this->client->get($url);

        var_dump($response);
    }

    /**
     * @param GeographicCoordinates $coordinates
     *
     * @return mixed
     */
    public function byGeographicCoordinates(GeographicCoordinates $coordinates)
    {
        $this->params->setParameter('lat', $coordinates->getLatitude());
        $this->params->setParameter('lon', $coordinates->getLongitude());

        $url = $this->urlFactory->build($this->params);

        $response = $this->client->get($url);

        var_dump($response);
    }

    /**
     * @inheritdoc
     */
    public function byZipCode(ZipCode $zipCode)
    {
        $this->params->setParameter('zip', $zipCode);

        $url = $this->urlFactory->build($this->params);
        var_dump($url);
        $response = $this->client->get($url);

        var_dump($response);
    }

    /**
     * @param BoundingBox $bbox
     * @param string $cluster
     *
     * @return mixed
     */
    public function withinARectangleZone(BoundingBox $bbox, $cluster = 'yes')
    {
        $params = $this->urlFactory->buildBag('/box/city');
        $params->setParameter('bbox', $bbox);
        $params->setParameter('cluster', $cluster);

        $url = $this->urlFactory->build($params);
        var_dump($url);
        $response = $this->client->get($url);

        var_dump($response);
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
        $params = $this->urlFactory->buildBag('/find');
        $params->setParameter('lat', $coordinates->getLatitude());
        $params->setParameter('lon', $coordinates->getLongitude());
        $params->setParameter('cluster', $cluster);
        $params->setParameter('cnt', $cnt);

        $url = $this->urlFactory->build($params);

        $response = $this->client->get($url);

        var_dump($response);
    }

    /**
     * @param array $cityIds
     *
     * @return mixed
     */
    public function severalCityIds(array $cityIds)
    {
        $params = $this->urlFactory->buildBag('/group');
        $params->setParameter('id', implode(',', $cityIds));

        $url = $this->urlFactory->build($params);

        $response = $this->client->get($url);

        var_dump($response);
    }
}

<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\CurrentWeather;
use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\Parameters\InputParameterBag;
use Marek\OpenWeatherLibrary\API\Value\ZipCode;
use Marek\OpenWeatherLibrary\Cache\HandlerInterface;
use Marek\OpenWeatherLibrary\Converter\ConverterInterface;
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

    /**
     * @var ConverterInterface
     */
    protected $converter;

    /**
     * @var HandlerInterface
     */
    protected $cache;

    public function __construct(
        HttpClientInterface $client,
        UrlFactory $urlFactory,
        ConverterInterface $converter,
        HandlerInterface $cache
    )
    {
        $this->client = $client;
        $this->urlFactory = $urlFactory;
        $this->params = $this->urlFactory->buildBag('/weather');
        $this->converter = $converter;
        $this->cache = $cache;
    }

    /**
     * @inheritdoc
     */
    public function byCityName(CityName $cityName)
    {
        $this->params->setParameter('q', $cityName);

        $url = $this->urlFactory->build($this->params);

        if ($this->cache->has($url)) {
            return $this->cache->get($url);
        }

        $response = $this->client->get($url);

        var_dump($response->getData()['clouds']);
        var_dump($response->getData());

        return $this->converter->convertByCityNameResult($response);
    }

    /**
     * @inheritdoc
     */
    public function byCityId($cityId)
    {
        $this->params->setParameter('id', $cityId);

        $url = $this->urlFactory->build($this->params);

        $response = $this->client->get($url);

        var_dump($response);
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
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
     * @inheritdoc
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
     * @inheritdoc
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

<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\CurrentWeather;
use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\Parameters\InputParameterBag;
use Marek\OpenWeatherLibrary\API\Value\ZipCode;
use Marek\OpenWeatherLibrary\Cache\CacheHandlerInterface;
use Marek\OpenWeatherLibrary\Core\BaseService;
use Marek\OpenWeatherLibrary\Factory\UrlFactory;
use Marek\OpenWeatherLibrary\Http\Client\HttpClientInterface;
use Marek\OpenWeatherLibrary\Hydrator\HydratorInterface;
use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather as ResponseCurrentWeather;

class CurrentWeatherService extends BaseService implements CurrentWeather
{
    /**
     * @var InputParameterBag
     */
    protected $params;

    /**
     * CurrentWeatherService constructor.
     *
     * @param HttpClientInterface $client
     * @param UrlFactory $factory
     * @param CacheHandlerInterface $cache
     * @param HydratorInterface $hydrator
     */
    public function __construct(
        HttpClientInterface $client,
        UrlFactory $factory,
        CacheHandlerInterface $cache,
        HydratorInterface $hydrator
    )
    {
        parent::__construct($client, $factory, $cache, $hydrator);
        $this->params = $this->factory->buildBag('/weather');
    }

    /**
     * @inheritdoc
     */
    public function byCityName(CityName $cityName)
    {
        $this->params->setParameter('q', $cityName);

        $url = $this->factory->build($this->params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function byCityId($cityId)
    {
        $this->params->setParameter('id', $cityId);

        $url = $this->factory->build($this->params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function byGeographicCoordinates(GeographicCoordinates $coordinates)
    {
        $this->params->setParameter('lat', $coordinates->getLatitude());
        $this->params->setParameter('lon', $coordinates->getLongitude());

        $url = $this->factory->build($this->params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function byZipCode(ZipCode $zipCode)
    {
        $this->params->setParameter('zip', $zipCode);

        $url = $this->factory->build($this->params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function withinARectangleZone(BoundingBox $bbox, $cluster = 'yes')
    {
        $params = $this->factory->buildBag('/box/city');
        $params->setParameter('bbox', $bbox);
        $params->setParameter('cluster', $cluster);

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function inCycle(GeographicCoordinates $coordinates, $cluster = 'yes', $cnt = 10)
    {
        $params = $this->factory->buildBag('/find');
        $params->setParameter('lat', $coordinates->getLatitude());
        $params->setParameter('lon', $coordinates->getLongitude());
        $params->setParameter('cluster', $cluster);
        $params->setParameter('cnt', $cnt);

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function severalCityIds(array $cityIds)
    {
        $params = $this->factory->buildBag('/group');
        $params->setParameter('id', implode(',', $cityIds));

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }
}

<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\CurrentWeather;
use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\CityCount;
use Marek\OpenWeatherLibrary\API\Value\CityId;
use Marek\OpenWeatherLibrary\API\Value\CityIds;
use Marek\OpenWeatherLibrary\API\Value\Cluster;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\ZipCode;
use Marek\OpenWeatherLibrary\Core\BaseService;
use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather as ResponseCurrentWeather;

class CurrentWeatherService extends BaseService implements CurrentWeather
{
    /**
     * @inheritdoc
     */
    public function byCityName(CityName $cityName)
    {
        $params = $this->factory
            ->buildBag();

        $params->setParameter($cityName);

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function byCityId(CityId $cityId)
    {
        $params = $this->factory
            ->buildBag();

        $params->setParameter($cityId);

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function byGeographicCoordinates(GeographicCoordinates $coordinates)
    {
        $params = $this->factory
            ->buildBag();

        $params->setParameter($coordinates->getLatitude());
        $params->setParameter($coordinates->getLongitude());

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function byZipCode(ZipCode $zipCode)
    {
        $params = $this->factory
            ->buildBag();

        $params->setParameter($zipCode);

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function withinARectangleZone(BoundingBox $bbox, Cluster $cluster)
    {
        $params = $this->factory
            ->buildBag();

        $params->setParameter($bbox);
        $params->setParameter($cluster);

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function inCycle(GeographicCoordinates $coordinates, Cluster $cluster, CityCount $cityCount)
    {
        $params = $this->factory
            ->buildBag();

        $params->setParameter($coordinates->getLatitude());
        $params->setParameter($coordinates->getLongitude());
        $params->setParameter($cluster);
        $params->setParameter($cityCount);

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }

    /**
     * @inheritdoc
     */
    public function severalCityIds(CityIds $cityIds)
    {
        $params = $this->factory
            ->buildBag();

        $params->setParameter($cityIds);

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new ResponseCurrentWeather);
    }
}

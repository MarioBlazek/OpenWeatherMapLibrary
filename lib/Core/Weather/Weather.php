<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Core\Weather;

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
use Marek\OpenWeatherMap\API\Value\Response\Weather\Weather as WeatherResponse;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;

class Weather extends Base implements WeatherInterface
{
    /**
     * {@inheritdoc}
     */
    public function byCityName(CityName $cityName)
    {
        $params = $this->factory->buildBag(self::URL_WEATHER);
        $params->setParameter($cityName);

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new WeatherResponse());
    }

    /**
     * {@inheritdoc}
     */
    public function byCityId(CityId $cityId)
    {
        $params = $this->factory->buildBag(self::URL_WEATHER);
        $params->setParameter($cityId);

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new WeatherResponse());
    }

    /**
     * {@inheritdoc}
     */
    public function byGeographicCoordinates(Latitude $latitude, Longitude $longitude)
    {
        $params = $this->factory->buildBag(self::URL_WEATHER);
        $params->setParameter($latitude);
        $params->setParameter($longitude);

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new WeatherResponse());
    }

    /**
     * {@inheritdoc}
     */
    public function byZipCode(ZipCode $zipCode)
    {
        $params = $this->factory->buildBag(self::URL_WEATHER);
        $params->setParameter($zipCode);

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new WeatherResponse());
    }

    /**
     * {@inheritdoc}
     */
    public function withinARectangleZone(BoundingBox $bbox, Cluster $cluster)
    {
        $params = $this->factory->buildBag(self::URL_BBOX);
        $params->setParameter($bbox);
        $params->setParameter($cluster);

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new AggregatedWeather());
    }

    /**
     * {@inheritdoc}
     */
    public function inCycle(Latitude $latitude, Longitude $longitude, Cluster $cluster, CityCount $cnt)
    {
        $params = $this->factory->buildBag(self::URL_CYCLE);
        $params->setParameter($latitude);
        $params->setParameter($longitude);
        $params->setParameter($cluster);
        $params->setParameter($cnt);

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new AggregatedWeather());
    }

    /**
     * {@inheritdoc}
     */
    public function severalCityIds(CityIds $cityIds)
    {
        $params = $this->factory->buildBag(self::URL_CITIES);
        $params->setParameter($cityIds);

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new AggregatedWeather());
    }
}

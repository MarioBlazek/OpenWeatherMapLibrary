<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Response\HourForecast\AggregatedHourForecast;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;

class HourForecast extends Base implements HourForecastInterface
{
    /**
     * {@inheritdoc}
     */
    public function fetchForecastByCityName(CityName $cityName): AggregatedHourForecast
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setGetParameter($cityName);

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new AggregatedHourForecast());
    }

    /**
     * {@inheritdoc}
     */
    public function fetchForecastByCityId(CityId $cityId): AggregatedHourForecast
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setGetParameter($cityId);

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new AggregatedHourForecast());
    }

    /**
     * {@inheritdoc}
     */
    public function fetchForecastByZipCode(ZipCode $zipCode): AggregatedHourForecast
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setGetParameter($zipCode);

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new AggregatedHourForecast());
    }

    /**
     * {@inheritdoc}
     */
    public function fetchForecastByCityGeographicCoordinates(GeographicCoordinates $coordinates): AggregatedHourForecast
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setGetParameter($coordinates->getLatitude());
        $params->setGetParameter($coordinates->getLongitude());

        $response = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($response, new AggregatedHourForecast());
    }
}

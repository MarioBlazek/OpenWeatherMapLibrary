<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Response\DailyForecast\AggregatedDailyForecast;
use Marek\OpenWeatherMap\API\Weather\Services\DailyForecastInterface;

class DailyForecast extends Base implements DailyForecastInterface
{
    /**
     * {@inheritdoc}
     */
    public function fetchForecastByCityName(CityName $cityName, DaysCount $numberOfDays)
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setParameter($cityName);
        $params->setParameter($numberOfDays);

        $response = $this->getResult($this->factory->build($params));

        return $this->hydrator->hydrate($response, new AggregatedDailyForecast());
    }

    /**
     * {@inheritdoc}
     */
    public function fetchForecastByCityId(CityId $cityId, DaysCount $numberOfDays)
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setParameter($cityId);
        $params->setParameter($numberOfDays);

        $response = $this->getResult($this->factory->build($params));

        return $this->hydrator->hydrate($response, new AggregatedDailyForecast());
    }

    /**
     * {@inheritdoc}
     */
    public function fetchForecastByZipCode(ZipCode $zipCode, DaysCount $numberOfDays)
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setParameter($zipCode);
        $params->setParameter($numberOfDays);

        $response = $this->getResult($this->factory->build($params));

        return $this->hydrator->hydrate($response, new AggregatedDailyForecast());
    }

    /**
     * {@inheritdoc}
     */
    public function fetchForecastByCityGeographicCoordinates(Latitude $latitude, Longitude $longitude, DaysCount $numberOfDays)
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setParameter($latitude);
        $params->setParameter($longitude);
        $params->setParameter($numberOfDays);

        $response = $this->getResult($this->factory->build($params));

        return $this->hydrator->hydrate($response, new AggregatedDailyForecast());
    }
}

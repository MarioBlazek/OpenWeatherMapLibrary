<?php

namespace Marek\OpenWeatherMap\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Response\HourForecast\AggregatedHourForecast;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;

class HourForecast extends Base implements HourForecastInterface
{
    /**
     * @inheritDoc
     */
    public function fetchForecastByCityName(CityName $cityName)
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setParameter($cityName);

        $response = $this->getResult($this->factory->build($params));

        return $this->hydrator->hydrate($response, new AggregatedHourForecast());
    }

    /**
     * @inheritDoc
     */
    public function fetchForecastByCityId(CityId $cityId)
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setParameter($cityId);

        $response = $this->getResult($this->factory->build($params));

        return $this->hydrator->hydrate($response, new AggregatedHourForecast());
    }

    /**
     * @inheritDoc
     */
    public function fetchForecastByZipCode(ZipCode $zipCode)
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setParameter($zipCode);

        $response = $this->getResult($this->factory->build($params));

        return $this->hydrator->hydrate($response, new AggregatedHourForecast());
    }

    /**
     * @inheritDoc
     */
    public function fetchForecastByCityGeographicCoordinates(Latitude $latitude, Longitude $longitude)
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setParameter($latitude);
        $params->setParameter($longitude);

        $response = $this->getResult($this->factory->build($params));

        return $this->hydrator->hydrate($response, new AggregatedHourForecast());
    }
}

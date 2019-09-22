<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Period;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\AggregatedUltravioletIndex;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex as UltravioletIndexResponse;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;

final class UltravioletIndex extends Base implements UltravioletIndexInterface
{
    public function fetchCurrentUltravioletIndex(GeographicCoordinates $coordinates): UltravioletIndexResponse
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setGetParameter($coordinates->getLatitude());
        $params->setGetParameter($coordinates->getLongitude());

        $result = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($result, new UltravioletIndexResponse());
    }

    public function fetchForecastUltravioletIndex(GeographicCoordinates $coordinates, DaysCount $daysCount): AggregatedUltravioletIndex
    {
        $params = $this->factory->buildBag(self::BASE_URL . '/forecast');
        $params->setGetParameter($coordinates->getLatitude());
        $params->setGetParameter($coordinates->getLongitude());
        $params->setGetParameter($daysCount);

        $result = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($result, new AggregatedUltravioletIndex());
    }

    public function fetchHistoricalUltravioletIndex(GeographicCoordinates $coordinates, Period $period, DaysCount $daysCount): AggregatedUltravioletIndex
    {
        $params = $this->factory->buildBag(self::BASE_URL . '/history');
        $params->setGetParameter($coordinates->getLatitude());
        $params->setGetParameter($coordinates->getLongitude());
        $params->setGetParameter($period->getStart());
        $params->setGetParameter($period->getEnd());
        $params->setGetParameter($daysCount);

        $result = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($result, new AggregatedUltravioletIndex());
    }
}

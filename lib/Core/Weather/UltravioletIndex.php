<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex as UltravioletIndexResponse;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;

class UltravioletIndex extends Base implements UltravioletIndexInterface
{
    /**
     * {@inheritdoc}
     */
    public function fetchUltravioletIndex(GeographicCoordinates $coordinates, DateTime $datetime)
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setParameter($coordinates);
        $params->setParameter($datetime);

        $result = $this->getResult($this->factory->build($params));

        return $this->denormalizer->denormalize($result, new UltravioletIndexResponse());
    }
}

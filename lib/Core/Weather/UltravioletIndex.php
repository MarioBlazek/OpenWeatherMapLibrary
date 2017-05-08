<?php

namespace Marek\OpenWeatherMap\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex as UltravioletIndexResponse;

class UltravioletIndex extends Base implements UltravioletIndexInterface
{
    /**
     * @inheritDoc
     */
    public function fetchUltravioletIndex(GeographicCoordinates $coordinates, DateTime $datetime)
    {
        $params = $this->factory->buildBag(self::BASE_URL);
        $params->setParameter($coordinates);
        $params->setParameter($datetime);

        $result = $this->getResult($this->factory->build($params));

        return $this->hydrator->hydrate($result, new UltravioletIndexResponse());
    }
}

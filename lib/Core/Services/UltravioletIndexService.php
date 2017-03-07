<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\UltravioletIndex;
use Marek\OpenWeatherLibrary\API\Value\Datetime;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\Core\BaseService;

class UltravioletIndexService extends BaseService implements UltravioletIndex
{
    /**
     * @inheritdoc
     */
    public function fetchUltravioletIndex(GeographicCoordinates $coordinates, Datetime $datetime)
    {
        $params = $this->factory
            ->buildBag('/{location}/{datetime}.json');

        $params->setParameter($coordinates);
        $params->setParameter($datetime);

        $url = $this->factory
            ->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new \Marek\OpenWeatherLibrary\API\Value\Response\UltravioletIndex());
    }
}

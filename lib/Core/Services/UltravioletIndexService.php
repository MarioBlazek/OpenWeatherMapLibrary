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
        // TODO: Implement fetchUltravioletIndex() method.
    }
}

<?php

namespace Marek\OpenWeatherMap\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;

class AirPollutionHydrator extends BaseHydrator implements HydratorInterface
{
    public function hydrate($data, APIResponse $response)
    {
        if (!$response instanceof UltravioletIndex) {
            return $response;
        }
    }
}

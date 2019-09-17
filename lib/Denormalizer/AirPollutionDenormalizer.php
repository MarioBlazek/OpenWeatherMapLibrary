<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Denormalizer;

use Marek\OpenWeatherMap\API\Value\Response\AirPollution\AirPollution;
use Marek\OpenWeatherMap\API\Value\Response\APIResponse;

class AirPollutionDenormalizer extends AbstractDenormalizer
{
    public function denormalize(array $data, APIResponse $response): APIResponse
    {
        if ($response instanceof AirPollution) {
            return $response;
        }


    }
}

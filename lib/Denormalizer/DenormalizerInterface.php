<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Denormalizer;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;

interface DenormalizerInterface
{
    /**
     * Hydrates response.
     *
     * @param array $data
     * @param \Marek\OpenWeatherMap\API\Value\Response\APIResponse $response
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\APIResponse
     */
    public function denormalize(array $data, APIResponse $response): APIResponse;
}

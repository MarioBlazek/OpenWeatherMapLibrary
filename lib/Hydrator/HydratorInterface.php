<?php

namespace Marek\OpenWeatherMap\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;

interface HydratorInterface
{
    /**
     * Hydrates response
     *
     * @param string $data
     * @param APIResponse $response
     *
     * @return APIResponse
     */
    public function hydrate($data, APIResponse $response);
}

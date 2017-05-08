<?php

namespace Marek\OpenWeatherMap\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;

class TestHydrator implements HydratorInterface
{
    /**
     * @inheritDoc
     */
    public function hydrate($data)
    {
        return $data;
    }
}

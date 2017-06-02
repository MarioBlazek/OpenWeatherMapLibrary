<?php

namespace Marek\OpenWeatherMap\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;

class UltravioletIndexHydrator extends BaseHydrator implements HydratorInterface
{
    /**
     * @inheritDoc
     */
    public function hydrate($data, APIResponse $response)
    {
        if (!$response instanceof UltravioletIndex) {
            return $response;
        }

        if (is_string($data)) {
            $data = json_decode($data, true);
        }

        $response->data = empty($data['data']) ? null : $data['data'];
        $response->time = $this->getDateTime('time', $data);
        $response->location = $this->getValue('location', $data, new GeographicCoordinates());

        return $response;
    }
}

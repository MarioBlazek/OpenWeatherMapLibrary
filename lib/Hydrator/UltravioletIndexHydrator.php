<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;

class UltravioletIndexHydrator extends BaseHydrator implements HydratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function hydrate($data, APIResponse $response)
    {
        if (!$response instanceof UltravioletIndex) {
            return $response;
        }

        if (is_string($data)) {
            $data = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
        }

        $response->data = empty($data['data']) ? null : $data['data'];
        $response->time = $this->getDateTime('time', $data);
        $response->location = $this->getValue('location', $data, new GeographicCoordinates());

        return $response;
    }
}

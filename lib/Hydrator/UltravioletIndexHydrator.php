<?php

namespace Marek\OpenWeatherMap\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;

class UltravioletIndexHydrator extends BaseHydrator implements HydratorInterface
{
    /**
     * @inheritDoc
     */
    public function hydrate($data)
    {
        if (is_string($data)) {
            $data = json_decode($data, true);
        }

        $ultravioletIndex = new UltravioletIndex();
        $ultravioletIndex->data = empty($data['data']) ? null : $data['data'];
        $ultravioletIndex->time = $this->getDateTime('time', $data);
        $ultravioletIndex->location = $this->getValue('location', $data, new GeographicCoordinates());

        return $ultravioletIndex;
    }
}

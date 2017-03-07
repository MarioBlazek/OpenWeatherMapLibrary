<?php

namespace Marek\OpenWeatherLibrary\Hydrator;

use Marek\OpenWeatherLibrary\API\Value\Response\Location;
use Marek\OpenWeatherLibrary\API\Value\Response\UltravioletIndex;

class UltravioletIndexHydrator implements HydratorInterface
{
    /**
     * @inheritDoc
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof UltravioletIndex) {
            return $object;
        }

        $object->time = $data['time'];
        $object->data = $data['data'];

        $location = new Location(
            $data['location']['latitude'],
            $data['location']['longitude']
        );

        $object->location = $location;

        return $object;
    }
}

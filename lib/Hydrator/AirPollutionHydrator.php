<?php

namespace Marek\OpenWeatherLibrary\Hydrator;

use Marek\OpenWeatherLibrary\API\Value\Response\AirPollution;

class AirPollutionHydrator extends BaseHydrator
{
    /**
     * @inheritdoc
     */
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof AirPollution) {
            return $object;
        }

        $object->time = $data['time'];

        $location = new AirPollution\Location($data['location']['latitude'], $data['location']['longitude']);
        $object->location = $location;

        $datums = [];
        foreach ($data['data'] as $datum) {
            $dtm = new AirPollution\Data(
                empty(!$datum['value']) ? $datum['value'] : '',
                empty(!$datum['pressure']) ? $datum['pressure'] : '',
                empty(!$datum['precision']) ? $datum['precision'] : ''
            );

            $datums[] = $dtm;
        }

        $object->data = $datums;

        return $object;
    }
}


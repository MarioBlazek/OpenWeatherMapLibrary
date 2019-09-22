<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Denormalizer;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\AggregatedUltravioletIndex;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;

class UltravioletIndexDenormalizer extends AbstractDenormalizer
{
    public function denormalize(array $data, APIResponse $response): APIResponse
    {
        if ($response instanceof AggregatedUltravioletIndex) {
            return $this->denormalizeMultiple($data, $response);
        }

        if (!$response instanceof  UltravioletIndex) {
            return $response;
        }

        return $this->denormalizeSingle($data, $response);
    }

    protected function denormalizeSingle(array $data, UltravioletIndex $index): UltravioletIndex
    {
        $index->value = $this->getData('value', $data);
        $index->date = $this->getDateTimeFromTimestamp('date', $data);
        $index->isoDate = $this->getValue('date_iso', $data, \DateTimeInterface::class);

        $location = new GeographicCoordinates();
        $location->latitude = $this->getData('lat', $data);
        $location->longitude = $this->getData('lon', $data);

        $index->location = $location;

        return $index;
    }

    protected function denormalizeMultiple($data, AggregatedUltravioletIndex $response): AggregatedUltravioletIndex
    {
        $indexes = [];
        foreach ($data as $datum) {
            $indexes[] = $this->denormalizeSingle($datum, new UltravioletIndex());
        }

        $response->count = count($indexes);
        $response->indexes = $indexes;

        return $response;
    }
}

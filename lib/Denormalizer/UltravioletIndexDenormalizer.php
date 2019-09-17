<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Denormalizer;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;

class UltravioletIndexDenormalizer extends AbstractDenormalizer
{
    public function denormalize(array $data, APIResponse $response): APIResponse
    {
        if (!$response instanceof UltravioletIndex) {
            return $response;
        }

        $response->value = $this->getData('value', $data);
        $response->date = $this->getDateTimeFromTimestamp('date', $data);
        $response->isoDate = $this->getValue('date_iso', $data, \DateTimeInterface::class);

        $location = new GeographicCoordinates();
        $location->latitude = $this->getData('lat', $data);
        $location->longitude = $this->getData('lon', $data);

        $response->location = $location;

        return $response;
    }
}

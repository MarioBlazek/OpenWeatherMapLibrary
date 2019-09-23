<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Denormalizer;

use Marek\OpenWeatherMap\API\Value\Response\AirPollution\AirPollution;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\CarbonMonoxide;
use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;

class AirPollutionDenormalizer extends AbstractDenormalizer
{
    public function denormalize(array $data, APIResponse $response): APIResponse
    {
        if ($response instanceof CarbonMonoxide) {
            $response->time = $this->getValue('time', $data, \DateTimeInterface::class);

            $location = new GeographicCoordinates();
            $location->latitude = $this->getData('latitude', $data['location']);
            $location->longitude = $this->getData('longitude', $data['location']);

            $response->location = $location;

            $polutions = [];
            foreach ($data['data'] as $datum) {
                $pollution = new AirPollution();
                $pollution->precision = $datum['precision'];
                $pollution->pressure = $datum['pressure'];
                $pollution->value = $datum['value'];

                $polutions[] = $pollution;
            }

            $response->data = $polutions;

            return $response;
        }

        return $response;
    }
}

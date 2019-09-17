<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Hydrator\Strategy;

use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Zend\Hydrator\Strategy\StrategyInterface;

class GeographicCoordinatesStrategy implements StrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function extract($value)
    {
        throw new \RuntimeException('This should never be called.');
    }

    /**
     * {@inheritdoc}
     */
    public function hydrate($value)
    {
        $gc = new GeographicCoordinates();
        if (array_key_exists('lon', $value) && array_key_exists('lat', $value)) {
            $gc->latitude = $value['lat'];
            $gc->longitude = $value['lon'];
        }

        return $gc;
    }
}

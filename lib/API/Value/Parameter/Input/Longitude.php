<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Exception\InvalidArgumentException;
use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

class Longitude implements GetParameterInterface
{
    /**
     * @var float
     */
    protected $longitude;

    /**
     * Longitude constructor.
     *
     * @param float $longitude
     */
    public function __construct(float $longitude)
    {
        $this->validate($longitude);
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue()
    {
        return (string) $this->longitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName()
    {
        return 'lon';
    }

    protected function validate(float $longitude): void
    {
        if ($longitude < -180 || $longitude > 180) {
            throw new InvalidArgumentException((string)$longitude, 'longitude', self::class);
        }
    }
}

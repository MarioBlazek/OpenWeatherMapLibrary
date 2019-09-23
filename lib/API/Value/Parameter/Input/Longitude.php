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
     *
     * @param float $longitude
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\InvalidArgumentException
     */
    public function __construct(float $longitude)
    {
        $this->validate($longitude);
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue(): string
    {
        return (string) $this->longitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName(): string
    {
        return 'lon';
    }

    /**
     * @param float $longitude
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\InvalidArgumentException
     */
    protected function validate(float $longitude): void
    {
        if ($longitude < -180 || $longitude > 180) {
            throw new InvalidArgumentException((string) $longitude, 'longitude', self::class);
        }
    }
}

<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Exception\InvalidArgumentException;
use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

class Latitude implements GetParameterInterface
{
    /**
     * @var float
     */
    protected $latitude;

    /**
     * Latitude constructor.
     *
     * @param float $latitude
     */
    public function __construct(float $latitude)
    {
        $this->validate($latitude);
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue()
    {
        return (string) $this->latitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName()
    {
        return 'lat';
    }

    protected function validate(float $latitude): void
    {
        if ($latitude < -90 || $latitude > 90) {
            throw new InvalidArgumentException((string)$latitude, 'latitude', self::class);
        }
    }
}

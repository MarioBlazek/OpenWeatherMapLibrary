<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

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
}

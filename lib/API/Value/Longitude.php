<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\GetParameterInterface;

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
    public function __construct($longitude)
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
     * @inheritdoc
     */
    public function getGetParameterValue()
    {
        return (string)$this->longitude;
    }

    /**
     * @inheritdoc
     */
    public function getGetParameterName()
    {
        return 'lon';
    }
}

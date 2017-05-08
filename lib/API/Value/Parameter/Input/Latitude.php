<?php

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

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
    public function __construct($latitude)
    {
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
     * @inheritDoc
     */
    public function getGetParameterValue()
    {
        return (string)$this->latitude;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterName()
    {
        return 'lat';
    }
}

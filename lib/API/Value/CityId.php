<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\GetParameterInterface;

class CityId implements GetParameterInterface
{
    /**
     * @var int
     */
    protected $cityId;

    /**
     * CityId constructor.
     *
     * @param int $cityId
     */
    public function __construct($cityId)
    {
        $this->cityId = $cityId;
    }

    /**
     * @return int
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterValue()
    {
        return (string)$this->cityId;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterName()
    {
        return 'id';
    }
}

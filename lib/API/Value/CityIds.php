<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\GetParameterInterface;

class CityIds implements GetParameterInterface
{
    /**
     * @var CityId[]
     */
    protected $cityIds;

    /**
     * CityIds constructor.
     *
     * @param CityId[] $cityIds
     */
    public function __construct(array $cityIds = [])
    {
        $this->cityIds = $cityIds;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterValue()
    {
        $values = [];
        foreach ($this->cityIds as $cityId) {
            $values[] = $cityId->getCityId();
        }

        return implode(",", $values);
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterName()
    {
        return 'id';
    }
}

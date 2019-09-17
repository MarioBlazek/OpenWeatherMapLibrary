<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

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
     * {@inheritdoc}
     */
    public function getGetParameterValue()
    {
        $values = [];
        foreach ($this->cityIds as $cityId) {
            $values[] = $cityId->getCityId();
        }

        return implode(',', $values);
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName()
    {
        return 'id';
    }
}

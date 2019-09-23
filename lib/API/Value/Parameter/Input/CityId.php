<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

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
    public function __construct(int $cityId)
    {
        $this->cityId = $cityId;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->cityId;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue(): string
    {
        return (string) $this->cityId;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName(): string
    {
        return 'id';
    }
}

<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\GetParameterInterface;

class DaysCount implements GetParameterInterface
{
    /**
     * @var int
     */
    protected $count;

    /**
     * DaysCount constructor.
     *
     * @param int $numberOfDays
     */
    public function __construct($numberOfDays)
    {
        $this->count = $numberOfDays;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterValue()
    {
        return (string)$this->count;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterName()
    {
        return 'cnt';
    }
}

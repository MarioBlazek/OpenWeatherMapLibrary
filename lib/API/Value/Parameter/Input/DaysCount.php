<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

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
    public function __construct($numberOfDays = 10)
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
     * {@inheritdoc}
     */
    public function getGetParameterValue()
    {
        return (string) $this->count;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName()
    {
        return 'cnt';
    }
}

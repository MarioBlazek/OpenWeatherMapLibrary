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
    public function __construct(int $numberOfDays = 10)
    {
        $this->count = $numberOfDays;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue(): string
    {
        return (string) $this->count;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName(): string
    {
        return 'cnt';
    }
}

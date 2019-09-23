<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

class CityCount implements GetParameterInterface
{
    /**
     * @var int
     */
    protected $cnt;

    /**
     * CityCount constructor.
     *
     * @param int $cnt
     */
    public function __construct(int $cnt = 10)
    {
        $this->cnt = $cnt;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue(): string
    {
        return (string) $this->cnt;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName(): string
    {
        return 'cnt';
    }
}

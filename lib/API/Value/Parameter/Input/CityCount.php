<?php

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
    public function __construct($cnt = 10)
    {
        $this->cnt = $cnt;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterValue()
    {
        return (string)$this->cnt;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterName()
    {
        return 'cnt';
    }
}

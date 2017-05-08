<?php

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

class StationsCount
{
    /**
     * @var int
     */
    protected $stationsCount;

    /**
     * StationsCount constructor.
     *
     * @param int $stationsCount
     */
    public function __construct($stationsCount = 10)
    {
        $this->stationsCount = $stationsCount;
    }

    /**
     * @return int
     */
    public function getStationsCount()
    {
        return $this->stationsCount;
    }
}

<?php

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

class StationId
{
    /**
     * @var int
     */
    protected $stationId;

    /**
     * StationId constructor.
     *
     * @param int $stationId
     */
    public function __construct($stationId)
    {
        $this->stationId = $stationId;
    }

    /**
     * @return int
     */
    public function getStationId()
    {
        return $this->stationId;
    }
}

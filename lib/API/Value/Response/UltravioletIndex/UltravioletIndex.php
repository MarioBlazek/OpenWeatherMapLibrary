<?php

namespace Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\Location;

/**
 * @property \DateTime $time
 * @property Location $location
 * @property float $data
 */
class UltravioletIndex extends APIResponse
{
    /**
     * @var \DateTime
     */
    protected $time;

    /**
     * @var Location
     */
    protected $location;

    /**
     * @var float
     */
    protected $data;
}

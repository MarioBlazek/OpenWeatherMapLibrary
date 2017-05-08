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
    public $time;

    /**
     * @var Location
     */
    public $location;

    /**
     * @var float
     */
    public $data;
}

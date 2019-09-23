<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\Location;

class UltravioletIndex extends APIResponse
{
    /**
     * @var \DateTime
     */
    public $date;

    /**
     * @var \DateTime
     */
    public $isoDate;

    /**
     * @var Location
     */
    public $location;

    /**
     * @var float
     */
    public $value;
}

<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Response\HourForecast;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;

class AggregatedHourForecast extends APIResponse
{
    /**
     * @var int
     */
    public $count;

    /**
     * @var HourForecast[]
     */
    public $list;
}

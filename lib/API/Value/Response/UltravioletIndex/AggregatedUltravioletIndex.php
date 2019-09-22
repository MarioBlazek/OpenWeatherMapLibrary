<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;

class AggregatedUltravioletIndex extends APIResponse
{
    /**
     * @var UltravioletIndex[]
     */
    public $indexes;

    /**
     * @var int
     */
    public $count;
}

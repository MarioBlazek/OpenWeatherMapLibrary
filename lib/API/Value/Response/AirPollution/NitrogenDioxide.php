<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Response\AirPollution;

class NitrogenDioxide extends Base
{
    /**
     * @var AirPollution
     */
    public $no2;

    /**
     * @var AirPollution
     */
    public $no2Strat;

    /**
     * @var AirPollution
     */
    public $no2Trop;
}

<?php

namespace Marek\OpenWeatherLibrary\Factory;

use Marek\OpenWeatherLibrary\API\Value\Parameters\InputParameterBag;
use Marek\OpenWeatherLibrary\API\Value\Units;

class UrlFactory
{
    /**
     * @var string
     */
    protected $appid;

    /**
     * @var string
     */
    protected $units;

    /**
     * @var string
     */
    protected $baseUrl;

    public function __construct($baseUrl, $appid, $units = Units::STANDARD)
    {
        $this->appid = $appid;
        $this->units = $units;
        $this->baseUrl = $baseUrl;
    }

    public function build(InputParameterBag $bag)
    {
        return
            $this->baseUrl .
            $bag->buildQuery() .
            '&appid=' . $this->appid .
            '&units=' . $this->units;
    }
}

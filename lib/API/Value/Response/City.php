<?php

namespace Marek\OpenWeatherMap\API\Value\Response;

class City
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $country;

    /**
     * @var int
     */
    public $population;

    /**
     * @var GeographicCoordinates
     */
    public $coord;
}

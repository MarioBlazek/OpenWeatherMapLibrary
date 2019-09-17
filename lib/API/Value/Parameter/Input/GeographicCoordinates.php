<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\UriParameterInterface;

class GeographicCoordinates implements UriParameterInterface
{
    /**
     * @var Latitude
     */
    protected $latitude;

    /**
     * @var Longitude
     */
    protected $longitude;

    /**
     * GeographicCoordinates constructor.
     *
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct($latitude, $longitude)
    {
        $this->latitude = new Latitude($latitude);
        $this->longitude = new Longitude($longitude);
    }

    /**
     * @return Latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return Longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return string
     */
    public function getUriParameterValue()
    {
        return (string) $this->latitude->getLatitude() .
            ',' .
            (string) $this->longitude->getLongitude();
    }

    /**
     * @return string
     */
    public function getUriParameterName()
    {
        return 'location';
    }
}

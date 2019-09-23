<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\UriParameterInterface;

class GeographicCoordinates implements UriParameterInterface
{
    /**
     * @var \Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude
     */
    protected $latitude;

    /**
     * @var \Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude
     */
    protected $longitude;

    /**
     * GeographicCoordinates constructor.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude $latitude
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude $longitude
     */
    public function __construct(Latitude $latitude, Longitude $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return \Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude
     */
    public function getLatitude(): Latitude
    {
        return $this->latitude;
    }

    /**
     * @return \Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude
     */
    public function getLongitude(): Longitude
    {
        return $this->longitude;
    }

    /**
     * @return string
     */
    public function getUriParameterValue(): string
    {
        return (string) $this->latitude->getLatitude() .
            ',' .
            (string) $this->longitude->getLongitude();
    }

    /**
     * @return string
     */
    public function getUriParameterName(): string
    {
        return 'location';
    }
}

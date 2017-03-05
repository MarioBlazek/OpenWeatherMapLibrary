<?php

namespace Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather;

use Marek\OpenWeatherLibrary\API\ContainerInterface;
use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather\Weather as AggregatedWeather;

class Weather implements ContainerInterface
{
    /**
     * @var AggregatedWeather[]
     */
    public $weathers;

    /**
     * @param AggregatedWeather $weather
     */
    public function add($weather)
    {
        if ($weather instanceof AggregatedWeather) {
            $this->weathers[] = $weather;
        }

        throw new \RuntimeException('Wrong parameter passed');
    }
}

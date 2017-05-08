<?php

namespace Marek\OpenWeatherMap\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\Clouds;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\Main;
use Marek\OpenWeatherMap\API\Value\Response\Rain;
use Marek\OpenWeatherMap\API\Value\Response\Snow;
use Marek\OpenWeatherMap\API\Value\Response\Sys;
use Marek\OpenWeatherMap\API\Value\Response\Weather\Weather;
use Marek\OpenWeatherMap\API\Value\Response\WeatherValue;
use Marek\OpenWeatherMap\API\Value\Response\Wind;

class WeatherHydrator extends BaseHydrator implements HydratorInterface
{
    /**
     * @inheritDoc
     */
    public function hydrate($data, APIResponse $response)
    {
        if (is_string($data)) {
            $data = json_decode($data, true);
        }

        $innerWeather = [];
        foreach ($data['weather'] as $w) {
            $innerWeather[] = $this->hydrator->hydrate($w, new WeatherValue);
        }

        $weather = new Weather();
        $weather->id = $data['id'];
        $weather->name = $data['name'];
        $weather->visibility = empty($data['visibility']) ? null : $data['visibility'];
        $weather->coord = $this->getValue('coord', $data, new GeographicCoordinates());
        $weather->rain = $this->getValue('rain', $data, new Rain());
        $weather->snow = $this->getValue('snow', $data, new Snow());
        $weather->wind = $this->getValue('wind', $data, new Wind());
        $weather->clouds = $this->getValue('clouds', $data, new Clouds());
        $weather->main = $this->getValue('main', $data, new Main());
        $weather->sys = $this->getValue('sys', $data, new Sys());
        $weather->weather = $innerWeather;
        $weather->dt = empty($data['dt']) ? null : new \DateTime("@{$data['dt']}");

        return $weather;
    }
}

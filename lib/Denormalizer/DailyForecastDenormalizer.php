<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Denormalizer;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\Clouds;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\Main;
use Marek\OpenWeatherMap\API\Value\Response\Rain;
use Marek\OpenWeatherMap\API\Value\Response\Snow;
use Marek\OpenWeatherMap\API\Value\Response\Sys;
use Marek\OpenWeatherMap\API\Value\Response\Weather\AggregatedWeather;
use Marek\OpenWeatherMap\API\Value\Response\Weather\Weather;
use Marek\OpenWeatherMap\API\Value\Response\WeatherValue;
use Marek\OpenWeatherMap\API\Value\Response\Wind;

class DailyForecastDenormalizer extends AbstractDenormalizer
{
    public function denormalize(array $data, APIResponse $response): APIResponse
    {
        if ($response instanceof AggregatedWeather) {
            return $this->denormalizeMultiple($data, $response);
        }

        return $this->denormalizeSingle($data, $response);
    }

    /**
     * @param $data
     * @param Weather $weather
     *
     * @return Weather
     */
    protected function denormalizeSingle(array $data, Weather $weather): Weather
    {
        $innerWeather = [];
        foreach ($data['weather'] as $w) {
            $innerWeather[] = $this->denormalizer->denormalize($w, WeatherValue::class);
        }

        $weather->id = $data['id'];
        $weather->name = $data['name'];
        $weather->visibility = empty($data['visibility']) ?? $data['visibility'];
        $weather->coord = $this->getValue('coord', $data, GeographicCoordinates::class);
        $weather->rain = $this->getValue('rain', $data, Rain::class);
        $weather->snow = $this->getValue('snow', $data, Snow::class);
        $weather->wind = $this->getValue('wind', $data, Wind::class);
        $weather->clouds = $this->getValue('clouds', $data, Clouds::class);
        $weather->main = $this->getValue('main', $data, Main::class);
        $weather->sys = $this->getValue('sys', $data, Sys::class);
        $weather->weather = $innerWeather;
        $weather->dt = empty($data['dt']) ? null : new \DateTimeImmutable("@{$data['dt']}");

        return $weather;
    }

    /**
     * @param array $data
     * @param AggregatedWeather $weather
     *
     * @return AggregatedWeather
     */
    protected function denormalizeMultiple($data, AggregatedWeather $weather): AggregatedWeather
    {
        $weathers = [];
        foreach ($data['list'] as $datum) {
            $weathers[] = $this->denormalizeSingle($datum, new Weather());
        }

        $weather->count = empty($data['cnt']) ? $data['count'] : $data['cnt'];
        $weather->weathers = $weathers;

        return $weather;
    }
}

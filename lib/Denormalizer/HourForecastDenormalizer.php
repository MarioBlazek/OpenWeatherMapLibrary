<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Denormalizer;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\Clouds;
use Marek\OpenWeatherMap\API\Value\Response\HourForecast\AggregatedHourForecast;
use Marek\OpenWeatherMap\API\Value\Response\HourForecast\HourForecast;
use Marek\OpenWeatherMap\API\Value\Response\Main;
use Marek\OpenWeatherMap\API\Value\Response\Rain;
use Marek\OpenWeatherMap\API\Value\Response\Snow;
use Marek\OpenWeatherMap\API\Value\Response\Sys;
use Marek\OpenWeatherMap\API\Value\Response\WeatherValue;
use Marek\OpenWeatherMap\API\Value\Response\Wind;

class HourForecastDenormalizer extends AbstractDenormalizer
{
    public function denormalize(array $data, APIResponse $response): APIResponse
    {
        if (!$response instanceof AggregatedHourForecast) {
            return $response;
        }

        $hourForecasts = [];
        foreach ($data['list'] as $item) {
            $innerWeather = [];
            foreach ($item['weather'] as $w) {
                $innerWeather[] = $this->denormalizer->denormalize($w, WeatherValue::class);
            }

            $hourForecast = new HourForecast();
            $hourForecast->rain = $this->getValue('rain', $item, Rain::class);
            $hourForecast->snow = $this->getValue('snow', $item, Snow::class);
            $hourForecast->wind = $this->getValue('wind', $item, Wind::class);
            $hourForecast->clouds = $this->getValue('clouds', $item, Clouds::class);
            $hourForecast->main = $this->getValue('main', $item, Main::class);
            $hourForecast->weather = $innerWeather;
            $hourForecast->sys = $this->getValue('sys', $item, Sys::class);
            $hourForecast->dt = $this->getDateTimeFromTimestamp('dt', $item);
            $hourForecast->dt_txt = empty($data['dt_txt']) ? null : \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $data['dt_txt']);

            $hourForecasts[] = $hourForecast;
        }

        $response->count = $this->getData('cnt', $data);
        $response->list = $hourForecasts;

        return $response;
    }
}

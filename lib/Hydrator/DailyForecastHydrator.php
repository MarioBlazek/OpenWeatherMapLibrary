<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\City;
use Marek\OpenWeatherMap\API\Value\Response\DailyForecast\AggregatedDailyForecast;
use Marek\OpenWeatherMap\API\Value\Response\DailyForecast\DailyForecast;
use Marek\OpenWeatherMap\API\Value\Response\Temperature;
use Marek\OpenWeatherMap\API\Value\Response\WeatherValue;

class DailyForecastHydrator extends BaseHydrator implements HydratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function hydrate($data, APIResponse $response)
    {
        if (!$response instanceof AggregatedDailyForecast) {
            return $response;
        }

        if (is_string($data)) {
            $data = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
        }

        $dailyForecasts = [];
        foreach ($data['list'] as $item) {
            $innerWeather = [];
            foreach ($item['weather'] as $w) {
                $innerWeather[] = $this->hydrator->hydrate($w, new WeatherValue());
            }

            $dailyForecast = new DailyForecast();
            $dailyForecast->temp = $this->getValue('temp', $item, new Temperature());
            $dailyForecast->dt = $this->getDateTimeFromTimestamp('dt', $item);
            $dailyForecast->pressure = $this->get('pressure', $item);
            $dailyForecast->humidity = $this->get('humidity', $item);
            $dailyForecast->speed = $this->get('speed', $item);
            $dailyForecast->deg = $this->get('deg', $item);
            $dailyForecast->clouds = $this->get('clouds', $item);
            $dailyForecast->rain = $this->get('rain', $item);
            $dailyForecast->weather = $innerWeather;

            $dailyForecasts[] = $dailyForecast;
        }

        $response->count = $this->get('cnt', $data);
        $response->list = $dailyForecasts;
        $response->city = $this->hydrator->hydrate($data['city'], new City());

        return $response;
    }
}

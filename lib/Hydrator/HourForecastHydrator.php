<?php

namespace Marek\OpenWeatherMap\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\Clouds;
use Marek\OpenWeatherMap\API\Value\Response\HourForecast\AggregatedHourForecast;
use Marek\OpenWeatherMap\API\Value\Response\HourForecast\HourForecast;
use Marek\OpenWeatherMap\API\Value\Response\Main;
use Marek\OpenWeatherMap\API\Value\Response\Rain;
use Marek\OpenWeatherMap\API\Value\Response\Snow;
use Marek\OpenWeatherMap\API\Value\Response\Sys;
use Marek\OpenWeatherMap\API\Value\Response\Wind;
use Marek\OpenWeatherMap\API\Value\Response\WeatherValue;

class HourForecastHydrator extends BaseHydrator implements HydratorInterface
{
    /**
     * @inheritDoc
     */
    public function hydrate($data, APIResponse $response)
    {
        if (!$response instanceof AggregatedHourForecast) {
            return $response;
        }

        if (is_string($data)) {
            $data = json_decode($data, true);
        }

        $hourForecasts = [];
        foreach ($data['list'] as $item) {

            $innerWeather = [];
            foreach ($item['weather'] as $w) {
                $innerWeather[] = $this->hydrator->hydrate($w, new WeatherValue);
            }

            $hourForecast = new HourForecast();
            $hourForecast->rain = $this->getValue('rain', $item, new Rain());
            $hourForecast->snow = $this->getValue('snow', $item, new Snow());
            $hourForecast->wind = $this->getValue('wind', $item, new Wind());
            $hourForecast->clouds = $this->getValue('clouds', $item, new Clouds());
            $hourForecast->main = $this->getValue('main', $item, new Main());
            $hourForecast->weather = $innerWeather;
            $hourForecast->sys = $this->getValue('sys', $item, new Sys());
            $hourForecast->dt = $this->getDateTimeFromTimestamp('dt', $item);
            $hourForecast->dt_txt = empty($data['dt_txt']) ? null : \DateTime::createFromFormat("Y-m-d H:i:s", $data['dt_txt']);

            $hourForecasts[] = $hourForecast;
        }

        $response->count = $this->get('cnt', $data);
        $response->list = $hourForecasts;

        return $response;
    }
}

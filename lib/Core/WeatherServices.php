<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Core;

use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;
use Marek\OpenWeatherMap\API\Weather\WeatherServicesInterface;

class WeatherServices implements WeatherServicesInterface
{
    /**
     * @var \Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface
     */
    protected $weatherService;

    /**
     * @var \Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface
     */
    protected $hourForecastService;

    /**
     * @var \Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface
     */
    protected $ultravioletIndexService;

    /**
     * @var \Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface
     */
    protected $airPollutionService;

    /**
     * WeatherServices constructor.
     *
     * @param \Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface $weatherService
     * @param \Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface $hourForecastService
     * @param \Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface $ultravioletIndexService
     * @param \Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface $airPollutionService
     */
    public function __construct(
        WeatherInterface $weatherService,
        HourForecastInterface $hourForecastService,
        UltravioletIndexInterface $ultravioletIndexService,
        AirPollutionInterface $airPollutionService
    ) {
        $this->weatherService = $weatherService;
        $this->hourForecastService = $hourForecastService;
        $this->ultravioletIndexService = $ultravioletIndexService;
        $this->airPollutionService = $airPollutionService;
    }

    /**
     * {@inheritdoc}
     */
    public function getWeatherService(): WeatherInterface
    {
        return $this->weatherService;
    }

    /**
     * {@inheritdoc}
     */
    public function getAirPollutionService(): AirPollutionInterface
    {
        return $this->airPollutionService;
    }

    /**
     * {@inheritdoc}
     */
    public function getUltravioletIndexService(): UltravioletIndexInterface
    {
        return $this->ultravioletIndexService;
    }

    /**
     * {@inheritdoc}
     */
    public function getHourForecastService(): HourForecastInterface
    {
        return $this->hourForecastService;
    }
}

<?php

namespace Marek\OpenWeatherMap\Core;

use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;
use Marek\OpenWeatherMap\API\Weather\Services\DailyForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;
use Marek\OpenWeatherMap\API\Weather\WeatherServicesInterface;

class WeatherServices implements WeatherServicesInterface
{
    /**
     * @var WeatherInterface
     */
    protected $weatherService;

    /**
     * @var HourForecastInterface
     */
    protected $hourForecastService;

    /**
     * @var DailyForecastInterface
     */
    protected $dailyForecastService;

    /**
     * @var UltravioletIndexInterface
     */
    protected $ultravioletIndexService;

    /**
     * @var AirPollutionInterface
     */
    protected $airPollutionService;

    /**
     * WeatherServices constructor.
     *
     * @param WeatherInterface $weatherService
     * @param HourForecastInterface $hourForecastService
     * @param DailyForecastInterface $dailyForecastService
     * @param UltravioletIndexInterface $ultravioletIndexService
     * @param AirPollutionInterface $airPollutionService
     */
    public function __construct(
        WeatherInterface $weatherService,
        HourForecastInterface $hourForecastService,
        DailyForecastInterface $dailyForecastService,
        UltravioletIndexInterface $ultravioletIndexService,
        AirPollutionInterface $airPollutionService
    )
    {
        $this->weatherService = $weatherService;
        $this->hourForecastService = $hourForecastService;
        $this->dailyForecastService = $dailyForecastService;
        $this->ultravioletIndexService = $ultravioletIndexService;
        $this->airPollutionService = $airPollutionService;
    }

    /**
     * @inheritDoc
     */
    public function getWeatherService()
    {
        return $this->weatherService;
    }

    /**
     * @inheritDoc
     */
    public function getAirPollutionService()
    {
        return $this->airPollutionService;
    }

    /**
     * @inheritDoc
     */
    public function getUltravioletIndexService()
    {
        return $this->ultravioletIndexService;
    }

    /**
     * @inheritDoc
     */
    public function getHourForecastService()
    {
        return $this->hourForecastService;
    }

    /**
     * @inheritDoc
     */
    public function getDailyForecastService()
    {
        return $this->dailyForecastService;
    }
}

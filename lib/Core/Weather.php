<?php

namespace Marek\OpenWeatherLibrary\Core;

use Marek\OpenWeatherLibrary\API\WeatherInterface;
use Marek\OpenWeatherLibrary\Core\Services\AirPollutionService;
use Marek\OpenWeatherLibrary\Core\Services\CurrentWeatherService;
use Marek\OpenWeatherLibrary\Core\Services\DailyForecastService;
use Marek\OpenWeatherLibrary\Core\Services\HourForecastService;
use Marek\OpenWeatherLibrary\Core\Services\UltravioletIndexService;
use Marek\OpenWeatherLibrary\Core\Services\WeatherStationsService;

class Weather implements WeatherInterface
{
    /**
     * @var CurrentWeatherService
     */
    protected $currentWeatherService;

    /**
     * @var AirPollutionService
     */
    protected $airPollutionService;

    /**
     * @var DailyForecastService
     */
    protected $dailyForecastService;

    /**
     * @var HourForecastService
     */
    protected $hourForecastService;

    /**
     * @var UltravioletIndexService
     */
    protected $ultravioletIndexService;

    /**
     * @var WeatherStationsService
     */
    protected $weatherStationsService;

    /**
     * Weather constructor.
     *
     * @param CurrentWeatherService $currentWeatherService
     * @param AirPollutionService $airPollutionService
     * @param DailyForecastService $dailyForecastService
     * @param HourForecastService $hourForecastService
     * @param UltravioletIndexService $ultravioletIndexService
     * @param WeatherStationsService $weatherStationsService
     */
    public function __construct(
        CurrentWeatherService $currentWeatherService,
        AirPollutionService $airPollutionService,
        DailyForecastService $dailyForecastService,
        HourForecastService $hourForecastService,
        UltravioletIndexService $ultravioletIndexService,
        WeatherStationsService $weatherStationsService
    ) {
        $this->currentWeatherService = $currentWeatherService;
        $this->airPollutionService = $airPollutionService;
        $this->dailyForecastService = $dailyForecastService;
        $this->hourForecastService = $hourForecastService;
        $this->ultravioletIndexService = $ultravioletIndexService;
        $this->weatherStationsService = $weatherStationsService;
    }

    /**
     * @inheritdoc
     */
    public function getCurrentWeatherService()
    {
        return $this->currentWeatherService;
    }

    /**
     * @inheritdoc
     */
    public function getAirPullutionService()
    {
        return $this->airPollutionService;
    }

    /**
     * @inheritdoc
     */
    public function getDailyForecastService()
    {
        return $this->dailyForecastService;
    }

    /**
     * @inheritdoc
     */
    public function getHourForecastService()
    {
        return $this->hourForecastService;
    }

    /**
     * @inheritdoc
     */
    public function getUltravioletIndexService()
    {
        return $this->ultravioletIndexService;
    }

    /**
     * @inheritdoc
     */
    public function getWeatherStationsService()
    {
        return $this->weatherStationsService;
    }
}

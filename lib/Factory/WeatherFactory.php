<?php

namespace Marek\OpenWeatherMap\Factory;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration;
use Marek\OpenWeatherMap\Core\Weather\AirPollution;
use Marek\OpenWeatherMap\Core\Weather\DailyForecast;
use Marek\OpenWeatherMap\Core\Weather\HourForecast;
use Marek\OpenWeatherMap\Core\Weather\UltravioletIndex;
use Marek\OpenWeatherMap\Core\Weather\Weather;
use Marek\OpenWeatherMap\Core\WeatherServices;
use Marek\OpenWeatherMap\Http\Client\HttpClient;
use Marek\OpenWeatherMap\Http\Client\HttpClientInterface;
use Marek\OpenWeatherMap\Hydrator\AirPollutionHydrator;
use Marek\OpenWeatherMap\Hydrator\DailyForecastHydrator;
use Marek\OpenWeatherMap\Hydrator\HourForecastHydrator;
use Marek\OpenWeatherMap\Hydrator\UltravioletIndexHydrator;
use Marek\OpenWeatherMap\Hydrator\WeatherHydrator;

class WeatherFactory
{
    /**
     * @var APIConfiguration
     */
    protected $configuration;

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var HandlerInterface
     */
    protected $cache;

    /**
     * @var UrlFactory
     */
    protected $factory;

    /**
     * @var HydratorFactory
     */
    protected $hydratorFactory;

    /**
     * WeatherFactory constructor.
     *
     * @param APIConfiguration $configuration
     * @param CacheConfiguration $cacheConfiguration
     */
    public function __construct(APIConfiguration $configuration, CacheConfiguration $cacheConfiguration)
    {
        $this->configuration = $configuration;
        $this->httpClient = new HttpClient();

        $cacheFactory = new CacheFactory($cacheConfiguration);
        $this->cache = $cacheFactory->create();

        $this->factory = new UrlFactory($this->configuration);

        $this->hydratorFactory = new HydratorFactory();
    }

    /**
     * @return WeatherServices
     */
    public function createWeatherServices()
    {
        return new WeatherServices(
            $this->createWeatherService(),
            $this->createHourForecastService(),
            $this->createDailyForecastService(),
            $this->createUltravioletIndexService(),
            $this->createAirPollutionService()
        );
    }

    /**
     * @return Weather
     */
    public function createWeatherService()
    {
        return new Weather(
            $this->httpClient, $this->factory, $this->cache, new WeatherHydrator($this->hydratorFactory->create())
        );
    }

    /**
     * @return AirPollution
     */
    public function createAirPollutionService()
    {
        return new AirPollution(
            $this->httpClient, $this->factory, $this->cache, new AirPollutionHydrator($this->hydratorFactory->create())
        );
    }

    /**
     * @return UltravioletIndex
     */
    public function createUltravioletIndexService()
    {
        return new UltravioletIndex(
            $this->httpClient, $this->factory, $this->cache, new UltravioletIndexHydrator($this->hydratorFactory->create())
        );
    }

    /**
     * @return HourForecast
     */
    public function createHourForecastService()
    {
        return new HourForecast(
            $this->httpClient, $this->factory, $this->cache, new HourForecastHydrator($this->hydratorFactory->create())
        );
    }

    /**
     * @return DailyForecast
     */
    public function createDailyForecastService()
    {
        return new DailyForecast(
            $this->httpClient,$this->factory, $this->cache, new DailyForecastHydrator($this->hydratorFactory->create())
        );
    }
}

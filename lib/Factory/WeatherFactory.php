<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Factory;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Marek\OpenWeatherMap\Core\Weather\AirPollution;
use Marek\OpenWeatherMap\Core\Weather\DailyForecast;
use Marek\OpenWeatherMap\Core\Weather\HourForecast;
use Marek\OpenWeatherMap\Core\Weather\UltravioletIndex;
use Marek\OpenWeatherMap\Core\Weather\Weather;
use Marek\OpenWeatherMap\Core\WeatherServices;
use Marek\OpenWeatherMap\Denormalizer\AirPollutionDenormalizer;
use Marek\OpenWeatherMap\Denormalizer\DailyForecastDenormalizer;
use Marek\OpenWeatherMap\Denormalizer\HourForecastDenormalizer;
use Marek\OpenWeatherMap\Denormalizer\UltravioletIndexDenormalizer;
use Marek\OpenWeatherMap\Denormalizer\WeatherDenormalizer;
use Marek\OpenWeatherMap\Http\Client\HttpClientInterface;
use Marek\OpenWeatherMap\Http\Client\SymfonyHttpClient;
use Symfony\Component\HttpClient\HttpClient;

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
     * @var DenormalizerFactory
     */
    protected $denormalizerFactory;

    /**
     * WeatherFactory constructor.
     *
     * @param APIConfiguration $configuration
     * @param HandlerInterface $cache
     */
    public function __construct(APIConfiguration $configuration, HandlerInterface $cache)
    {
        $this->configuration = $configuration;
        $this->httpClient = new SymfonyHttpClient(HttpClient::create());
        $this->cache = $cache;
        $this->factory = new UrlFactory($this->configuration);
        $this->denormalizerFactory = new DenormalizerFactory();
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
            $this->httpClient,
            $this->factory,
            $this->cache,
            new WeatherDenormalizer($this->denormalizerFactory->create())
        );
    }

    /**
     * @return AirPollution
     */
    public function createAirPollutionService()
    {
        return new AirPollution(
            $this->httpClient,
            $this->factory,
            $this->cache,
            new AirPollutionDenormalizer($this->denormalizerFactory->create())
        );
    }

    /**
     * @return UltravioletIndex
     */
    public function createUltravioletIndexService()
    {
        return new UltravioletIndex(
            $this->httpClient,
            $this->factory,
            $this->cache,
            new UltravioletIndexDenormalizer($this->denormalizerFactory->create())
        );
    }

    /**
     * @return HourForecast
     */
    public function createHourForecastService()
    {
        return new HourForecast(
            $this->httpClient,
            $this->factory,
            $this->cache,
            new HourForecastDenormalizer($this->denormalizerFactory->create())
        );
    }

    /**
     * @return DailyForecast
     */
    public function createDailyForecastService()
    {
        return new DailyForecast(
            $this->httpClient,
            $this->factory,
            $this->cache,
            new DailyForecastDenormalizer($this->denormalizerFactory->create())
        );
    }
}

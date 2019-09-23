<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Factory;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;
use Marek\OpenWeatherMap\API\Weather\WeatherServicesInterface;
use Marek\OpenWeatherMap\Core\Weather\AirPollution;
use Marek\OpenWeatherMap\Core\Weather\HourForecast;
use Marek\OpenWeatherMap\Core\Weather\UltravioletIndex;
use Marek\OpenWeatherMap\Core\Weather\Weather;
use Marek\OpenWeatherMap\Core\WeatherServices;
use Marek\OpenWeatherMap\Denormalizer\AirPollutionDenormalizer;
use Marek\OpenWeatherMap\Denormalizer\HourForecastDenormalizer;
use Marek\OpenWeatherMap\Denormalizer\UltravioletIndexDenormalizer;
use Marek\OpenWeatherMap\Denormalizer\WeatherDenormalizer;
use Marek\OpenWeatherMap\Http\Client\SymfonyHttpClient;
use Symfony\Component\HttpClient\HttpClient;

class WeatherFactory
{
    /**
     * @var \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration
     */
    protected $configuration;

    /**
     * @var \Marek\OpenWeatherMap\Http\Client\HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var \Marek\OpenWeatherMap\API\Cache\HandlerInterface
     */
    protected $cache;

    /**
     * @var \Marek\OpenWeatherMap\Factory\UrlFactory
     */
    protected $factory;

    /**
     * @var \Marek\OpenWeatherMap\Factory\SerializerFactory
     */
    protected $serializerFactory;

    /**
     * WeatherFactory constructor.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration $configuration
     * @param \Marek\OpenWeatherMap\API\Cache\HandlerInterface $cache
     */
    public function __construct(APIConfiguration $configuration, HandlerInterface $cache)
    {
        $this->configuration = $configuration;
        $this->httpClient = new SymfonyHttpClient(HttpClient::create());
        $this->cache = $cache;
        $this->factory = new UrlFactory($this->configuration);
        $this->serializerFactory = new SerializerFactory();
    }

    /**
     * @return \Marek\OpenWeatherMap\API\Weather\WeatherServicesInterface
     */
    public function createWeatherServices(): WeatherServicesInterface
    {
        return new WeatherServices(
            $this->createWeatherService(),
            $this->createHourForecastService(),
            $this->createUltravioletIndexService(),
            $this->createAirPollutionService()
        );
    }

    /**
     * @return \Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface
     */
    public function createWeatherService(): WeatherInterface
    {
        return new Weather(
            $this->httpClient,
            $this->factory,
            $this->cache,
            new WeatherDenormalizer($this->serializerFactory->create())
        );
    }

    /**
     * @return \Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface
     */
    public function createAirPollutionService(): AirPollutionInterface
    {
        return new AirPollution(
            $this->httpClient,
            $this->factory,
            $this->cache,
            new AirPollutionDenormalizer($this->serializerFactory->create())
        );
    }

    /**
     * @return \Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface
     */
    public function createUltravioletIndexService(): UltravioletIndexInterface
    {
        return new UltravioletIndex(
            $this->httpClient,
            $this->factory,
            $this->cache,
            new UltravioletIndexDenormalizer($this->serializerFactory->create())
        );
    }

    /**
     * @return \Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface
     */
    public function createHourForecastService(): HourForecastInterface
    {
        return new HourForecast(
            $this->httpClient,
            $this->factory,
            $this->cache,
            new HourForecastDenormalizer($this->serializerFactory->create())
        );
    }
}

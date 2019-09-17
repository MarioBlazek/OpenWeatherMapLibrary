<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Factory;

use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration;
use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;
use Marek\OpenWeatherMap\API\Weather\Services\DailyForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;
use Marek\OpenWeatherMap\API\Weather\WeatherServicesInterface;
use Marek\OpenWeatherMap\Factory\WeatherFactory;
use PHPUnit\Framework\TestCase;

class WeatherFactoryTest extends TestCase
{
    /**
     * @var WeatherFactory
     */
    protected $factory;

    protected function setUp()
    {
        $apiConfiguration = new APIConfiguration('token');
        $cacheConfiguration = new CacheConfiguration(CacheConfiguration::NO_CACHE);

        $this->factory = new WeatherFactory($apiConfiguration, $cacheConfiguration);
    }

    public function testReturnsWeatherServices()
    {
        self::assertInstanceOf(WeatherServicesInterface::class, $this->factory->createWeatherServices());
    }

    public function testReturnsWeatherService()
    {
        self::assertInstanceOf(WeatherInterface::class, $this->factory->createWeatherService());
    }

    public function testReturnsUltravioletIndexService()
    {
        self::assertInstanceOf(UltravioletIndexInterface::class, $this->factory->createUltravioletIndexService());
    }

    public function testReturnsAirPollutionService()
    {
        self::assertInstanceOf(AirPollutionInterface::class, $this->factory->createAirPollutionService());
    }

    public function testReturnsDailyForecastService()
    {
        self::assertInstanceOf(DailyForecastInterface::class, $this->factory->createDailyForecastService());
    }

    public function testReturnsHourForecastService()
    {
        self::assertInstanceOf(HourForecastInterface::class, $this->factory->createHourForecastService());
    }
}

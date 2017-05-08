<?php

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

    public function setUp()
    {
        $apiConfiguration = new APIConfiguration('token');
        $cacheConfiguration = new CacheConfiguration(CacheConfiguration::NO_CACHE);

        $this->factory = new WeatherFactory($apiConfiguration, $cacheConfiguration);
    }

    public function testReturnsWeatherServices()
    {
        $this->assertInstanceOf(WeatherServicesInterface::class, $this->factory->createWeatherServices());
    }

    public function testReturnsWeatherService()
    {
        $this->assertInstanceOf(WeatherInterface::class, $this->factory->createWeatherService());
    }
    
    public function testReturnsUltravioletIndexService()
    {
        $this->assertInstanceOf(UltravioletIndexInterface::class, $this->factory->createUltravioletIndexService());
    }
    
    public function testReturnsAirPollutionService()
    {
        $this->assertInstanceOf(AirPollutionInterface::class, $this->factory->createAirPollutionService());
    }

    public function testReturnsDailyForecastService()
    {
        $this->assertInstanceOf(DailyForecastInterface::class, $this->factory->createDailyForecastService());
    }

    public function testReturnsHourForecastService()
    {
        $this->assertInstanceOf(HourForecastInterface::class, $this->factory->createHourForecastService());
    }
}

<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Factory;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;
use Marek\OpenWeatherMap\API\Weather\WeatherServicesInterface;
use Marek\OpenWeatherMap\Factory\WeatherFactory;
use PHPUnit\Framework\TestCase;

class WeatherFactoryTest extends TestCase
{
    /**
     * @var \Marek\OpenWeatherMap\Factory\WeatherFactory
     */
    protected $factory;

    /**
     * @var \Marek\OpenWeatherMap\API\Cache\HandlerInterface
     */
    protected $cache;

    protected function setUp(): void
    {
        $apiConfiguration = new APIConfiguration('token');
        $this->cache = $this->createMock(HandlerInterface::class);

        $this->factory = new WeatherFactory($apiConfiguration, $this->cache);
    }

    public function testReturnsWeatherServices(): void
    {
        self::assertInstanceOf(WeatherServicesInterface::class, $this->factory->createWeatherServices());
    }

    public function testReturnsWeatherService(): void
    {
        self::assertInstanceOf(WeatherInterface::class, $this->factory->createWeatherService());
    }

    public function testReturnsUltravioletIndexService(): void
    {
        self::assertInstanceOf(UltravioletIndexInterface::class, $this->factory->createUltravioletIndexService());
    }

    public function testReturnsAirPollutionService(): void
    {
        self::assertInstanceOf(AirPollutionInterface::class, $this->factory->createAirPollutionService());
    }

    public function testReturnsHourForecastService(): void
    {
        self::assertInstanceOf(HourForecastInterface::class, $this->factory->createHourForecastService());
    }
}

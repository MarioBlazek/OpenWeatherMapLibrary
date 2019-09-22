<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Core;

use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;
use Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;
use Marek\OpenWeatherMap\Core\WeatherServices;
use PHPUnit\Framework\TestCase;

class WeatherServicesTest extends TestCase
{
    public function testAggregate()
    {
        $weather = $this->getMockBuilder(WeatherInterface::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $ultravioletIndex = $this->getMockBuilder(UltravioletIndexInterface::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $airPollution = $this->getMockBuilder(AirPollutionInterface::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $hourForecast = $this->getMockBuilder(HourForecastInterface::class)
            ->disableOriginalConstructor()
            ->setMethods([])
            ->getMock();

        $service = new WeatherServices($weather, $hourForecast, $ultravioletIndex, $airPollution);

        self::assertSame($weather, $service->getWeatherService());
        self::assertSame($ultravioletIndex, $service->getUltravioletIndexService());
        self::assertSame($airPollution, $service->getAirPollutionService());
        self::assertSame($hourForecast, $service->getHourForecastService());
    }
}

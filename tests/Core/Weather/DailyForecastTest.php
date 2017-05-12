<?php

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Weather\Services\DailyForecastInterface;
use Marek\OpenWeatherMap\Core\Weather\DailyForecast;

class DailyForecastTest extends WeatherBase
{
    /**
     * @var DailyForecastInterface
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new DailyForecast($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfDailyForecastInterface()
    {
        $this->assertInstanceOf(DailyForecastInterface::class, $this->service);
    }
}

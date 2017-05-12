<?php

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;
use Marek\OpenWeatherMap\Core\Weather\HourForecast;

class HourForecastTest extends WeatherBase
{
    /**
     * @var HourForecastInterface
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new HourForecast($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfHourForecastInterface()
    {
        $this->assertInstanceOf(HourForecastInterface::class, $this->service);
    }
}

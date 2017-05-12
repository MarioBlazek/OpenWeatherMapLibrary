<?php

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;
use Marek\OpenWeatherMap\Core\Weather\Weather;

class WeatherTest extends WeatherBase
{
    /**
     * @var WeatherInterface
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new Weather($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfWeatherInterface()
    {
        $this->assertInstanceOf(WeatherInterface::class, $this->service);
    }
}

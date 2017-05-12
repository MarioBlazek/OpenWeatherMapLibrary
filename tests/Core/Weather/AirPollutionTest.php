<?php

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;
use Marek\OpenWeatherMap\Core\Weather\AirPollution;

class AirPollutionTest extends WeatherBase
{
    /**
     * @var AirPollution
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new AirPollution($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfAirPollutionIndex()
    {
        $this->assertInstanceOf(AirPollutionInterface::class, $this->service);
    }
}

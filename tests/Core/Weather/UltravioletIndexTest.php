<?php

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\Core\Weather\UltravioletIndex;

class UltravioletIndexTest extends WeatherBase
{
    /**
     * @var UltravioletIndex
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new UltravioletIndex($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfUltravioletIndex()
    {
        $this->assertInstanceOf(UltravioletIndex::class, $this->service);
    }
}

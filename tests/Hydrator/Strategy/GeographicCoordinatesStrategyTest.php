<?php

namespace Marek\OpenWeatherMap\Tests\Hydrator\Strategy;

use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\Hydrator\Strategy\GeographicCoordinatesStrategy;
use PHPUnit\Framework\TestCase;
use Zend\Hydrator\Strategy\StrategyInterface;

class GeographicCoordinatesStrategyTest extends TestCase
{
    /**
     * @var StrategyInterface
     */
    protected $strategy;

    public function setUp()
    {
        $this->strategy = new GeographicCoordinatesStrategy();
    }

    public function testInstanceOfStrategyInterface()
    {
        $this->assertInstanceOf(StrategyInterface::class, $this->strategy);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage This should never be called.
     */
    public function testExtract()
    {
        $this->strategy->extract('test');
    }

    public function testHydrateWithValues()
    {
        $value = [
            'lat' => 10,
            'lon' => 15,
        ];

        $result = $this->strategy->hydrate($value);

        $this->assertInstanceOf(GeographicCoordinates::class, $result);
        $this->assertEquals(10, $result->latitude);
        $this->assertEquals(15, $result->longitude);
    }

    public function testHydrateWithoutValue()
    {
        $value = [];

        $result = $this->strategy->hydrate($value);

        $this->assertInstanceOf(GeographicCoordinates::class, $result);
        $this->assertNull($result->latitude);
        $this->assertNull($result->longitude);
    }
}

<?php

declare(strict_types=1);

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

    protected function setUp()
    {
        $this->strategy = new GeographicCoordinatesStrategy();
    }

    public function testInstanceOfStrategyInterface()
    {
        self::assertInstanceOf(StrategyInterface::class, $this->strategy);
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

        self::assertInstanceOf(GeographicCoordinates::class, $result);
        self::assertSame(10, $result->latitude);
        self::assertSame(15, $result->longitude);
    }

    public function testHydrateWithoutValue()
    {
        $value = [];

        $result = $this->strategy->hydrate($value);

        self::assertInstanceOf(GeographicCoordinates::class, $result);
        self::assertNull($result->latitude);
        self::assertNull($result->longitude);
    }
}

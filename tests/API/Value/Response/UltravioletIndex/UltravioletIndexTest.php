<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Value\Response\UltravioletIndex;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;
use PHPUnit\Framework\TestCase;

class UltravioletIndexTest extends TestCase
{
    public function testValueObject()
    {
        $time = new \DateTimeImmutable();
        $location = new GeographicCoordinates(10, 10);

        $value = new UltravioletIndex([
            'time' => $time,
            'location' => $location,
            'data' => 34.3,
        ]);

        self::assertInstanceOf(APIResponse::class, $value);
        self::assertSame($time, $value->time);
        self::assertSame($location, $value->location);
        self::assertSame(34.3, $value->data);
    }

    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\PropertyNotFoundException
     * @expectedExceptionMessage Cannot find property test on class Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex
     */
    public function testValueObjectGetWithException()
    {
        $time = new \DateTimeImmutable();

        $value = new UltravioletIndex([
            'time' => $time,
        ]);

        self::assertInstanceOf(APIResponse::class, $value);
        $value->test;
    }

    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\PropertyNotFoundException
     * @expectedExceptionMessage Cannot find property test on class Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex
     */
    public function testValueObjectSetWithException()
    {
        $time = new \DateTimeImmutable();

        $value = new UltravioletIndex([
            'time' => $time,
        ]);

        self::assertInstanceOf(APIResponse::class, $value);
        $value->test = 'test';
    }

    public function testValueObjectSet()
    {
        $time = new \DateTimeImmutable();
        $location = new GeographicCoordinates(10, 10);

        $value = new UltravioletIndex([
            'time' => $time,
        ]);

        self::assertInstanceOf(APIResponse::class, $value);
        $value->location = $location;
    }
}

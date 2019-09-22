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
        $location = new GeographicCoordinates();
        $location->longitude = 10;
        $location->latitude = 10;

        $value = new UltravioletIndex();
        $value->date = $time;
        $value->isoDate = $time;
        $value->location = $location;
        $value->value = 34.3;

        self::assertInstanceOf(APIResponse::class, $value);
        self::assertSame($time, $value->date);
        self::assertSame($time, $value->isoDate);
        self::assertSame($location, $value->location);
        self::assertSame(34.3, $value->value);
    }
}

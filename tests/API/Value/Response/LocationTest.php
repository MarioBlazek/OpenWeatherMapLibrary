<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Value\Response;

use Marek\OpenWeatherMap\API\Value\Response\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testValueObject()
    {
        $location = new Location(14.5, 13.5);

        self::assertSame(14.5, $location->getLatitude());
        self::assertSame(13.5, $location->getLongitude());
    }
}

<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Response;

use Marek\OpenWeatherMap\API\Value\Response\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testValueObject()
    {
        $location = new Location(14.5, 13.5);

        $this->assertEquals(14.5, $location->getLatitude());
        $this->assertEquals(13.5, $location->getLongitude());
    }
}

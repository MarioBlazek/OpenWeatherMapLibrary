<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Response\UltravioletIndex;

use Marek\OpenWeatherMap\API\Value\Response\APIResponse;
use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;
use PHPUnit\Framework\TestCase;

class UltravioletIndexTest extends TestCase
{
    public function testValueObject()
    {
        $time = new \DateTime();
        $location = new GeographicCoordinates(10, 10);

        $value = new UltravioletIndex(array(
            'time' => $time,
            'location' => $location,
            'data' => 34.3,
        ));

        $this->assertInstanceOf(APIResponse::class, $value);
        $this->assertEquals($time, $value->time);
        $this->assertEquals($location, $value->location);
        $this->assertEquals(34.3, $value->data);
    }

    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\PropertyNotFoundException
     * @expectedExceptionMessage Cannot find property test on class Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex
     */
    public function testValueObjectGetWithException()
    {
        $time = new \DateTime();

        $value = new UltravioletIndex(array(
            'time' => $time,
        ));

        $this->assertInstanceOf(APIResponse::class, $value);
        $value->test;
    }

    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\PropertyNotFoundException
     * @expectedExceptionMessage Cannot find property test on class Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex
     */
    public function testValueObjectSetWithException()
    {
        $time = new \DateTime();

        $value = new UltravioletIndex(array(
            'time' => $time,
        ));

        $this->assertInstanceOf(APIResponse::class, $value);
        $value->test = 'test';
    }

    public function testValueObjectSet()
    {
        $time = new \DateTime();
        $location = new GeographicCoordinates(10, 10);

        $value = new UltravioletIndex(array(
            'time' => $time,
        ));

        $this->assertInstanceOf(APIResponse::class, $value);
        $value->location = $location;
    }
}

<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\UriParameterInterface;
use PHPUnit\Framework\TestCase;

class GeographicCoordinatesTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new GeographicCoordinates(10, 10);

        $this->assertInstanceOf(UriParameterInterface::class, $input);
        $this->assertEquals('location', $input->getUriParameterName());
        $this->assertEquals('10,10', $input->getUriParameterValue());
        $this->assertInstanceOf(Longitude::class, $input->getLongitude());
        $this->assertInstanceOf(Latitude::class, $input->getLatitude());
    }
}

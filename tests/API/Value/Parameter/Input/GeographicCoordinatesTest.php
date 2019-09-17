<?php

declare(strict_types=1);

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

        self::assertInstanceOf(UriParameterInterface::class, $input);
        self::assertSame('location', $input->getUriParameterName());
        self::assertSame('10,10', $input->getUriParameterValue());
        self::assertInstanceOf(Longitude::class, $input->getLongitude());
        self::assertInstanceOf(Latitude::class, $input->getLatitude());
    }
}

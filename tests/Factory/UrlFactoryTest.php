<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Factory;

use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\Factory\UrlFactory;
use PHPUnit\Framework\TestCase;

class UrlFactoryTest extends TestCase
{
    public function testItGeneratesValidUrl()
    {
        $config = new APIConfiguration('my_token');
        $factory = new UrlFactory($config);

        $bag = $factory->buildBag('www.example.com/{location}');

        $latitude = new Latitude(10);
        $longitude = new Longitude(10);
        $coordinates = new GeographicCoordinates($latitude, $longitude);

        $bag->setGetParameter($coordinates->getLongitude());
        $bag->setGetParameter($coordinates->getLatitude());
        $bag->setUriParameter($coordinates);

        $url = $factory->build($bag);

        self::assertSame('www.example.com/10,10?lon=10&lat=10&appid=my_token&units=standard&lang=en&type=accurate', $url);
    }
}

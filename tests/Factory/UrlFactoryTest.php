<?php

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

        $bag->setParameter(new GeographicCoordinates(5, 5));
        $bag->setParameter(new Longitude(10));
        $bag->setParameter(new Latitude(10));

        $url = $factory->build($bag);

        $this->assertEquals('www.example.com/5,5?lon=10&lat=10&appid=my_token&units=standard&lang=en&type=accurate', $url);
    }
}

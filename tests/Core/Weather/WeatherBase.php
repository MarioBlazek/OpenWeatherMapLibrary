<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\Factory\UrlFactory;
use Marek\OpenWeatherMap\Http\Client\HttpClientInterface;
use Marek\OpenWeatherMap\Hydrator\HydratorInterface;
use PHPUnit\Framework\TestCase;

class WeatherBase extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $client;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $factory;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $handler;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $hydrator;

    protected function setUp()
    {
        $this->client = $this->getMockBuilder(HttpClientInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['get'])
            ->getMock();

        $this->factory = $this->getMockBuilder(UrlFactory::class)
            ->disableOriginalConstructor()
            ->setMethods(['build', 'buildBag'])
            ->getMock();

        $this->handler = $this->getMockBuilder(HandlerInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['has', 'get', 'set'])
            ->getMock();

        $this->hydrator = $this->getMockBuilder(HydratorInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['hydrate'])
            ->getMock();
    }
}

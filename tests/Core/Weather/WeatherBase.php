<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\Denormalizer\DenormalizerInterface;
use Marek\OpenWeatherMap\Factory\UrlFactory;
use Marek\OpenWeatherMap\Http\Client\HttpClientInterface;
use PHPUnit\Framework\TestCase;

class WeatherBase extends TestCase
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    protected $client;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    protected $factory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    protected $handler;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    protected $denormalizer;

    protected function setUp(): void
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

        $this->denormalizer = $this->getMockBuilder(DenormalizerInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['denormalize'])
            ->getMock();
    }
}

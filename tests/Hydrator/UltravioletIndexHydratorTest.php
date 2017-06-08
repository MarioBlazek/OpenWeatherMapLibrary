<?php

namespace Marek\OpenWeatherMap\Tests\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;
use Marek\OpenWeatherMap\API\Value\Response\Weather\Weather;
use Marek\OpenWeatherMap\Hydrator\HydratorInterface;
use Marek\OpenWeatherMap\Hydrator\UltravioletIndexHydrator;
use PHPUnit\Framework\TestCase;

class UltravioletIndexHydratorTest extends TestCase
{
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $internalHydrator;

    public function setUp()
    {
        parent::setUp();
        $this->internalHydrator = $this->getMockBuilder(\Zend\Hydrator\HydratorInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['hydrate', 'extract'])
            ->getMock();

        $this->hydrator = new UltravioletIndexHydrator($this->internalHydrator);
    }

    public function testHydrate()
    {
        $location = [
            'latitude' => 40.75,
            'longitude' => -74.25,
        ];
        $data = [
            'time' => '2017-02-06T12:00:00Z',
            'location' => [
                $location,
            ],
            'data' => 1.69,
        ];

        $response = new UltravioletIndex();

        $geo = new GeographicCoordinates();
        $geo->latitude = 40.75;
        $geo->longitude = -74.25;

        $this->internalHydrator->expects($this->once())
            ->method('hydrate')
            ->with([$location])
            ->willReturn($geo);

        /** @var UltravioletIndex $result */
        $result = $this->hydrator->hydrate($data, $response);

        $this->assertEquals($data['data'], $result->data);
        $this->assertEquals(\DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $data['time'], new \DateTimeZone('UTC')), $result->time);
        $this->assertSame($geo, $result->location);
    }

    public function testHydrateWithRawData()
    {
        $data = "{\"time\":\"2017-02-06T12:00:00Z\",\"location\":{\"latitude\":40.75,\"longitude\":-74.25},\"data\":1.69}";
        $location = [
            'latitude' => 40.75,
            'longitude' => -74.25,
        ];

        $response = new UltravioletIndex();

        $geo = new GeographicCoordinates();
        $geo->latitude = 40.75;
        $geo->longitude = -74.25;

        $this->internalHydrator->expects($this->once())
            ->method('hydrate')
            ->with($location)
            ->willReturn($geo);

        $result = $this->hydrator->hydrate($data, $response);

        $this->assertEquals(1.69, $result->data);
        $this->assertSame($geo, $result->location);
    }

    public function testHydrateWithResponseNotUltravioletIndex()
    {
        $data = [];
        $response = new Weather();

        $this->internalHydrator->expects($this->never())
            ->method('hydrate');

        $result = $this->hydrator->hydrate($data, $response);

        $this->assertSame($response, $result);
    }
}
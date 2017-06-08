<?php

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag;
use Marek\OpenWeatherMap\Core\Weather\UltravioletIndex;
use Marek\OpenWeatherMap\Http\Response\JsonResponse;

class UltravioletIndexTest extends WeatherBase
{
    /**
     * @var UltravioletIndex
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new UltravioletIndex($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfUltravioletIndex()
    {
        $this->assertInstanceOf(UltravioletIndex::class, $this->service);
    }

    public function testFetchUltravioletIndex()
    {
        $coords = new GeographicCoordinates(10, 15);
        $dateTime = new DateTime();
        $parameterBag = new InputParameterBag(UltravioletIndex::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new \Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(UltravioletIndex::BASE_URL)
            ->willReturn($parameterBag);

        $this->factory->expects($this->once())
            ->method('build')
            ->with($parameterBag)
            ->willReturn($url);

        $this->handler->expects($this->once())
            ->method('has')
            ->with($urlHash)
            ->willReturn(false);

        $this->client->expects($this->once())
            ->method('get')
            ->with($url)
            ->willReturn($response);

        $this->hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($endResponse);

        $result = $this->service->fetchUltravioletIndex($coords, $dateTime);

        $this->assertSame($endResponse, $result);

    }

    public function testFetchUltravioletIndexFromCache()
    {
        $coords = new GeographicCoordinates(10, 15);
        $dateTime = new DateTime();
        $parameterBag = new InputParameterBag(UltravioletIndex::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new \Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(UltravioletIndex::BASE_URL)
            ->willReturn($parameterBag);

        $this->factory->expects($this->once())
            ->method('build')
            ->with($parameterBag)
            ->willReturn($url);

        $this->handler->expects($this->once())
            ->method('has')
            ->with($urlHash)
            ->willReturn(true);

        $this->handler->expects($this->once())
            ->method('get')
            ->with($urlHash)
            ->willReturn('some_data');

        $this->client->expects($this->never())
            ->method('get');

        $this->hydrator->expects($this->once())
            ->method('hydrate')
            ->willReturn($endResponse);

        $result = $this->service->fetchUltravioletIndex($coords, $dateTime);

        $this->assertSame($endResponse, $result);

    }

    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\NotFoundException
     */
    public function testFetchUltravioletIndexWithNotFound()
    {
        $coords = new GeographicCoordinates(10, 15);
        $dateTime = new DateTime();
        $parameterBag = new InputParameterBag(UltravioletIndex::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 404);

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(UltravioletIndex::BASE_URL)
            ->willReturn($parameterBag);

        $this->factory->expects($this->once())
            ->method('build')
            ->with($parameterBag)
            ->willReturn($url);

        $this->handler->expects($this->once())
            ->method('has')
            ->with($urlHash)
            ->willReturn(false);

        $this->client->expects($this->once())
            ->method('get')
            ->with($url)
            ->willReturn($response);

        $this->hydrator->expects($this->never())
            ->method('hydrate');

        $this->service->fetchUltravioletIndex($coords, $dateTime);
    }

    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\BadRequestException
     */
    public function testFetchUltravioletIndexWithBadRequest()
    {
        $coords = new GeographicCoordinates(10, 15);
        $dateTime = new DateTime();
        $parameterBag = new InputParameterBag(UltravioletIndex::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 400);

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(UltravioletIndex::BASE_URL)
            ->willReturn($parameterBag);

        $this->factory->expects($this->once())
            ->method('build')
            ->with($parameterBag)
            ->willReturn($url);

        $this->handler->expects($this->once())
            ->method('has')
            ->with($urlHash)
            ->willReturn(false);

        $this->client->expects($this->once())
            ->method('get')
            ->with($url)
            ->willReturn($response);

        $this->hydrator->expects($this->never())
            ->method('hydrate');

        $this->service->fetchUltravioletIndex($coords, $dateTime);
    }

    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\UnauthorizedException
     */
    public function testFetchUltravioletIndexWithUnauthorized()
    {
        $coords = new GeographicCoordinates(10, 15);
        $dateTime = new DateTime();
        $parameterBag = new InputParameterBag(UltravioletIndex::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 401);

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(UltravioletIndex::BASE_URL)
            ->willReturn($parameterBag);

        $this->factory->expects($this->once())
            ->method('build')
            ->with($parameterBag)
            ->willReturn($url);

        $this->handler->expects($this->once())
            ->method('has')
            ->with($urlHash)
            ->willReturn(false);

        $this->client->expects($this->once())
            ->method('get')
            ->with($url)
            ->willReturn($response);

        $this->hydrator->expects($this->never())
            ->method('hydrate');

        $this->service->fetchUltravioletIndex($coords, $dateTime);
    }

    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\ForbiddenException
     */
    public function testFetchUltravioletIndexWithForbidden()
    {
        $coords = new GeographicCoordinates(10, 15);
        $dateTime = new DateTime();
        $parameterBag = new InputParameterBag(UltravioletIndex::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 403);

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(UltravioletIndex::BASE_URL)
            ->willReturn($parameterBag);

        $this->factory->expects($this->once())
            ->method('build')
            ->with($parameterBag)
            ->willReturn($url);

        $this->handler->expects($this->once())
            ->method('has')
            ->with($urlHash)
            ->willReturn(false);

        $this->client->expects($this->once())
            ->method('get')
            ->with($url)
            ->willReturn($response);

        $this->hydrator->expects($this->never())
            ->method('hydrate');

        $this->service->fetchUltravioletIndex($coords, $dateTime);
    }
}

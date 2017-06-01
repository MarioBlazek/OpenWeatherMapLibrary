<?php

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\BoundingBox;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityIds;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;
use Marek\OpenWeatherMap\Core\Weather\Weather;
use Marek\OpenWeatherMap\Http\Response\JsonResponse;

class WeatherTest extends WeatherBase
{
    /**
     * @var WeatherInterface
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new Weather($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfWeatherInterface()
    {
        $this->assertInstanceOf(WeatherInterface::class, $this->service);
    }

    public function testWeatherByCityName()
    {
        $cityName = new CityName('Zagreb');
        $parameterBag = new InputParameterBag(WeatherInterface::URL_WEATHER);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(WeatherInterface::URL_WEATHER)
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

        $result = $this->service->byCityName($cityName);

        $this->assertSame($endResponse, $result);
    }

    public function testWeatherByCityId()
    {
        $cityId = new CityId(123);
        $parameterBag = new InputParameterBag(WeatherInterface::URL_WEATHER);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(WeatherInterface::URL_WEATHER)
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

        $result = $this->service->byCityId($cityId);

        $this->assertSame($endResponse, $result);
    }

    public function testWeatherByZipCode()
    {
        $zipCode = new ZipCode(123);
        $parameterBag = new InputParameterBag(WeatherInterface::URL_WEATHER);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(WeatherInterface::URL_WEATHER)
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

        $result = $this->service->byZipCode($zipCode);

        $this->assertSame($endResponse, $result);
    }

    public function testWeatherByGeographicCoordinates()
    {
        $latitude = new Latitude(123);
        $longitude = new Longitude(123);
        $parameterBag = new InputParameterBag(WeatherInterface::URL_WEATHER);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(WeatherInterface::URL_WEATHER)
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

        $result = $this->service->byGeographicCoordinates($latitude, $longitude);

        $this->assertSame($endResponse, $result);
    }

    public function testWeatherWithinRectangleZone()
    {
        $bbox = new BoundingBox(5, 5, 5, 5, 5);
        $cluster = new Cluster();
        $parameterBag = new InputParameterBag(WeatherInterface::URL_BBOX);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(WeatherInterface::URL_BBOX)
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

        $result = $this->service->withinARectangleZone($bbox, $cluster);

        $this->assertSame($endResponse, $result);
    }

    public function testWeatherInCycle()
    {
        $latitude = new Latitude(3);
        $longitude = new Longitude(4);
        $cityCount = new CityCount();
        $cluster = new Cluster();
        $parameterBag = new InputParameterBag(WeatherInterface::URL_CYCLE);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(WeatherInterface::URL_CYCLE)
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

        $result = $this->service->inCycle($latitude, $longitude, $cluster, $cityCount);

        $this->assertSame($endResponse, $result);
    }

    public function testWeatherForSeveralCityIds()
    {
        $ids = [new CityId(1), new CityId(2)];
        $cityIds = new CityIds($ids);
        $parameterBag = new InputParameterBag(WeatherInterface::URL_CITIES);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new \Marek\OpenWeatherMap\API\Value\Response\Weather\Weather();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(WeatherInterface::URL_CITIES)
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

        $result = $this->service->severalCityIds($cityIds);

        $this->assertSame($endResponse, $result);
    }
}

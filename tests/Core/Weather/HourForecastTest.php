<?php

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag;
use Marek\OpenWeatherMap\API\Value\Response\HourForecast\AggregatedHourForecast;
use Marek\OpenWeatherMap\API\Weather\Services\HourForecastInterface;
use Marek\OpenWeatherMap\Core\Weather\HourForecast;
use Marek\OpenWeatherMap\Http\Response\JsonResponse;

class HourForecastTest extends WeatherBase
{
    /**
     * @var HourForecastInterface
     */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new HourForecast($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfHourForecastInterface()
    {
        $this->assertInstanceOf(HourForecastInterface::class, $this->service);
    }

    public function testFetchForecastByCityName()
    {
        $cityName = new CityName('Zagreb');
        $parameterBag = new InputParameterBag(HourForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedHourForecast();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(HourForecastInterface::BASE_URL)
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

        $result = $this->service->fetchForecastByCityName($cityName);

        $this->assertSame($endResponse, $result);

    }

    public function testFetchForecastByCityId()
    {
        $cityId = new CityId(12345);
        $parameterBag = new InputParameterBag(HourForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedHourForecast();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(HourForecastInterface::BASE_URL)
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

        $result = $this->service->fetchForecastByCityId($cityId);

        $this->assertSame($endResponse, $result);

    }

    public function testFetchForecastByZipCode()
    {
        $zipCode = new ZipCode(12345);
        $parameterBag = new InputParameterBag(HourForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedHourForecast();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(HourForecastInterface::BASE_URL)
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

        $result = $this->service->fetchForecastByZipCode($zipCode);

        $this->assertSame($endResponse, $result);

    }

    public function testFetchForecastByGeographicCoordinates()
    {
        $latitude = new Latitude(10);
        $longitude = new Longitude(15);
        $parameterBag = new InputParameterBag(HourForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedHourForecast();

        $this->factory->expects($this->once())
            ->method('buildBag')
            ->with(HourForecastInterface::BASE_URL)
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

        $result = $this->service->fetchForecastByCityGeographicCoordinates($latitude, $longitude);

        $this->assertSame($endResponse, $result);

    }
}

<?php

declare(strict_types=1);

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

    protected function setUp()
    {
        parent::setUp();

        $this->service = new HourForecast($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfHourForecastInterface()
    {
        self::assertInstanceOf(HourForecastInterface::class, $this->service);
    }

    public function testFetchForecastByCityName()
    {
        $cityName = new CityName('Zagreb');
        $parameterBag = new InputParameterBag(HourForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedHourForecast();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(HourForecastInterface::BASE_URL)
            ->willReturn($parameterBag);

        $this->factory->expects(self::once())
            ->method('build')
            ->with($parameterBag)
            ->willReturn($url);

        $this->handler->expects(self::once())
            ->method('has')
            ->with($urlHash)
            ->willReturn(false);

        $this->client->expects(self::once())
            ->method('get')
            ->with($url)
            ->willReturn($response);

        $this->hydrator->expects(self::once())
            ->method('hydrate')
            ->willReturn($endResponse);

        $result = $this->service->fetchForecastByCityName($cityName);

        self::assertSame($endResponse, $result);
    }

    public function testFetchForecastByCityId()
    {
        $cityId = new CityId(12345);
        $parameterBag = new InputParameterBag(HourForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedHourForecast();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(HourForecastInterface::BASE_URL)
            ->willReturn($parameterBag);

        $this->factory->expects(self::once())
            ->method('build')
            ->with($parameterBag)
            ->willReturn($url);

        $this->handler->expects(self::once())
            ->method('has')
            ->with($urlHash)
            ->willReturn(false);

        $this->client->expects(self::once())
            ->method('get')
            ->with($url)
            ->willReturn($response);

        $this->hydrator->expects(self::once())
            ->method('hydrate')
            ->willReturn($endResponse);

        $result = $this->service->fetchForecastByCityId($cityId);

        self::assertSame($endResponse, $result);
    }

    public function testFetchForecastByZipCode()
    {
        $zipCode = new ZipCode(12345);
        $parameterBag = new InputParameterBag(HourForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedHourForecast();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(HourForecastInterface::BASE_URL)
            ->willReturn($parameterBag);

        $this->factory->expects(self::once())
            ->method('build')
            ->with($parameterBag)
            ->willReturn($url);

        $this->handler->expects(self::once())
            ->method('has')
            ->with($urlHash)
            ->willReturn(false);

        $this->client->expects(self::once())
            ->method('get')
            ->with($url)
            ->willReturn($response);

        $this->hydrator->expects(self::once())
            ->method('hydrate')
            ->willReturn($endResponse);

        $result = $this->service->fetchForecastByZipCode($zipCode);

        self::assertSame($endResponse, $result);
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

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(HourForecastInterface::BASE_URL)
            ->willReturn($parameterBag);

        $this->factory->expects(self::once())
            ->method('build')
            ->with($parameterBag)
            ->willReturn($url);

        $this->handler->expects(self::once())
            ->method('has')
            ->with($urlHash)
            ->willReturn(false);

        $this->client->expects(self::once())
            ->method('get')
            ->with($url)
            ->willReturn($response);

        $this->hydrator->expects(self::once())
            ->method('hydrate')
            ->willReturn($endResponse);

        $result = $this->service->fetchForecastByCityGeographicCoordinates($latitude, $longitude);

        self::assertSame($endResponse, $result);
    }
}

<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag;
use Marek\OpenWeatherMap\API\Value\Response\DailyForecast\AggregatedDailyForecast;
use Marek\OpenWeatherMap\API\Weather\Services\DailyForecastInterface;
use Marek\OpenWeatherMap\Core\Weather\DailyForecast;
use Marek\OpenWeatherMap\Http\Response\JsonResponse;

class DailyForecastTest extends WeatherBase
{
    /**
     * @var DailyForecastInterface
     */
    protected $service;

    protected function setUp()
    {
        parent::setUp();

        $this->service = new DailyForecast($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfDailyForecastInterface()
    {
        self::assertInstanceOf(DailyForecastInterface::class, $this->service);
    }

    public function testFetchForecastByCityName()
    {
        $cityName = new CityName('Zagreb');
        $numberOfDays = new DaysCount(1);
        $parameterBag = new InputParameterBag(DailyForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedDailyForecast();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(DailyForecastInterface::BASE_URL)
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

        $result = $this->service->fetchForecastByCityName($cityName, $numberOfDays);

        self::assertSame($endResponse, $result);
    }

    public function testFetchForecastByCityId()
    {
        $cityId = new CityId(12345);
        $numberOfDays = new DaysCount(1);
        $parameterBag = new InputParameterBag(DailyForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedDailyForecast();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(DailyForecastInterface::BASE_URL)
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

        $result = $this->service->fetchForecastByCityId($cityId, $numberOfDays);

        self::assertSame($endResponse, $result);
    }

    public function testFetchForecastByZipCode()
    {
        $zipCode = new ZipCode(12345);
        $numberOfDays = new DaysCount(1);
        $parameterBag = new InputParameterBag(DailyForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedDailyForecast();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(DailyForecastInterface::BASE_URL)
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

        $result = $this->service->fetchForecastByZipCode($zipCode, $numberOfDays);

        self::assertSame($endResponse, $result);
    }

    public function testFetchForecastByGeographicCoordinates()
    {
        $latitude = new Latitude(10);
        $longitude = new Longitude(15);
        $numberOfDays = new DaysCount(1);
        $parameterBag = new InputParameterBag(DailyForecastInterface::BASE_URL);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new AggregatedDailyForecast();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(DailyForecastInterface::BASE_URL)
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

        $result = $this->service->fetchForecastByCityGeographicCoordinates($latitude, $longitude, $numberOfDays);

        self::assertSame($endResponse, $result);
    }
}

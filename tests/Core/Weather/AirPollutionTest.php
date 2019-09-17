<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\NitrogenDioxide;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\Ozone;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\SulfurDioxide;
use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;
use Marek\OpenWeatherMap\Core\Weather\AirPollution;
use Marek\OpenWeatherMap\Http\Response\JsonResponse;

class AirPollutionTest extends WeatherBase
{
    /**
     * @var AirPollution
     */
    protected $service;

    protected function setUp()
    {
        parent::setUp();

        $this->service = new AirPollution($this->client, $this->factory, $this->handler, $this->hydrator);
    }

    public function testInstanceOfAirPollutionIndex()
    {
        self::assertInstanceOf(AirPollutionInterface::class, $this->service);
    }

    public function testFetchOzoneData()
    {
        $coords = new GeographicCoordinates(10, 15);
        $dateTime = new DateTime();
        $parameterBag = new InputParameterBag(AirPollutionInterface::URL_OZONE);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new Ozone();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(AirPollutionInterface::URL_OZONE)
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

        $result = $this->service->fetchOzoneData($coords, $dateTime);

        self::assertSame($endResponse, $result);
    }

    public function testFetchSulfurDioxideData()
    {
        $coords = new GeographicCoordinates(10, 15);
        $dateTime = new DateTime();
        $parameterBag = new InputParameterBag(AirPollutionInterface::URL_SULFUR_DIOXIDE);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new SulfurDioxide();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(AirPollutionInterface::URL_SULFUR_DIOXIDE)
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

        $result = $this->service->fetchSulfurDioxideData($coords, $dateTime);

        self::assertSame($endResponse, $result);
    }

    public function testFetchCarbonMonoxideData()
    {
        $coords = new GeographicCoordinates(10, 15);
        $dateTime = new DateTime();
        $parameterBag = new InputParameterBag(AirPollutionInterface::URL_CARBON_MONOXIDE);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new Ozone();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(AirPollutionInterface::URL_CARBON_MONOXIDE)
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

        $result = $this->service->fetchCarbonMonoxideData($coords, $dateTime);

        self::assertSame($endResponse, $result);
    }

    public function testFetchNitrogenDioxideData()
    {
        $coords = new GeographicCoordinates(10, 15);
        $dateTime = new DateTime();
        $parameterBag = new InputParameterBag(AirPollutionInterface::URL_NITROGEN_DIOXIDE);
        $url = 'url';
        $urlHash = md5($url);
        $response = new JsonResponse(['data' => 'data'], 200);
        $endResponse = new NitrogenDioxide();

        $this->factory->expects(self::once())
            ->method('buildBag')
            ->with(AirPollutionInterface::URL_NITROGEN_DIOXIDE)
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

        $result = $this->service->fetchNitrogenDioxideData($coords, $dateTime);

        self::assertSame($endResponse, $result);
    }
}

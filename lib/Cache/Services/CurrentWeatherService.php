<?php

namespace Marek\OpenWeatherLibrary\Cache\Services;

use Marek\OpenWeatherLibrary\API\Services\CurrentWeather;
use Marek\OpenWeatherLibrary\API\Value\BoundingBox;
use Marek\OpenWeatherLibrary\API\Value\CityName;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\ZipCode;
use Marek\OpenWeatherLibrary\Cache\HandlerInterface;
use Marek\OpenWeatherLibrary\Converter\CurrentWeatherConverter;
use Marek\OpenWeatherLibrary\Core\Services\CurrentWeatherService as InnerCurrentWeatherService;
use Marek\OpenWeatherLibrary\Factory\UrlFactory;
use Marek\OpenWeatherLibrary\Http\Client\HttpClientInterface;

class CurrentWeatherService implements CurrentWeather
{
    /**
     * @var HandlerInterface
     */
    protected $cache;

    /**
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * @var UrlFactory
     */
    protected $urlFactory;

    /**
     * @var CurrentWeatherConverter
     */
    protected $converter;

    /**
     * @var InnerCurrentWeatherService
     */
    protected $innerCurrentWeatherService;

    /**
     * CurrentWeatherService constructor.
     *
     * @param HttpClientInterface $client
     * @param UrlFactory $urlFactory
     * @param CurrentWeatherConverter $converter
     * @param HandlerInterface $cache
     * @param InnerCurrentWeatherService $innerCurrentWeatherService
     */
    public function __construct(
        HandlerInterface $cache,
        InnerCurrentWeatherService $innerCurrentWeatherService
    )
    {
        $this->cache = $cache;
        $this->innerCurrentWeatherService = $innerCurrentWeatherService;
    }

    /**
     * @inheritdoc
     */
    public function byCityName(CityName $cityName)
    {
        $key = (string)$cityName;

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $response = $this->innerCurrentWeatherService
            ->byCityName($cityName);

        $this->cache->set($key, (string)$response);

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function byCityId($cityId)
    {
        // TODO: Implement byCityId() method.
    }

    /**
     * @inheritdoc
     */
    public function byGeographicCoordinates(GeographicCoordinates $coordinates)
    {
        // TODO: Implement byGeographicCoordinates() method.
    }

    /**
     * @inheritdoc
     */
    public function byZipCode(ZipCode $zipCode)
    {
        // TODO: Implement byZipCode() method.
    }

    /**
     * @inheritdoc
     */
    public function withinARectangleZone(BoundingBox $bbox, $cluster = 'yes')
    {
        // TODO: Implement withinARectangleZone() method.
    }

    /**
     * @inheritdoc
     */
    public function inCycle(GeographicCoordinates $coordinates, $cluster = 'yes', $cnt = 10)
    {
        // TODO: Implement inCycle() method.
    }

    /**
     * @inheritdoc
     */
    public function severalCityIds(array $cityIds)
    {
        // TODO: Implement severalCityIds() method.
    }
}

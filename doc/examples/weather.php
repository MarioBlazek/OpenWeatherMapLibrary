<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Marek\OpenWeatherMap\Core\Cache\SymfonyCache;
use Marek\OpenWeatherMap\Factory\WeatherFactory;
use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityIds;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\BoundingBox;
use Marek\OpenWeatherMap\Constraints\UnitsFormat;

$key = require_once __DIR__ . '/api_key.php';

$configuration = new APIConfiguration(
    $key,
    UnitsFormat::METRIC
);
$cache = new FilesystemAdapter();
$handler = new SymfonyCache($cache);

$factory = new WeatherFactory($configuration, $handler);

/** @var WeatherInterface $weatherService */
$weatherService = $factory->createWeatherService();

// By city name
$cityName = new CityName('Zagreb');
$weather = $weatherService->byCityName($cityName);

// By city id
$cityId = new CityId(2172797);
$weather = $weatherService->byCityId($cityId);


// By geographic coordinates
$latitude = new Latitude(35);
$longitude = new Longitude(139);
$weather = $weatherService->byGeographicCoordinates($latitude, $longitude);

// By zip code
$zipCode = new ZipCode(94040, 'us');
$weather = $weatherService->byZipCode($zipCode);

// By rectangle zone
$bbox = new BoundingBox(12, 32, 15, 37, 10);
$cluster = new Cluster();
$weather = $weatherService->withinARectangleZone($bbox, $cluster);

// By cycle
$latitude = new Latitude(55.5);
$longitude = new Longitude(37.5);
$cluster = new Cluster();
$cityCount = new CityCount();
$weather = $weatherService->inCycle($latitude, $longitude, $cluster, $cityCount);

// Several city ids
$cityIdOne = new CityId(524901);
$cityIdTwo = new CityId(703448);
$cityIdThree = new CityId(2643743);
$cityIds = new CityIds([$cityIdOne, $cityIdTwo, $cityIdThree]);
$weather = $weatherService->severalCityIds($cityIds);

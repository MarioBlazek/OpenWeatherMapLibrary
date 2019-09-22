<?php

require_once __DIR__ . '/bootstrap.php';

use Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityIds;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\BoundingBox;

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
$coordinates = new GeographicCoordinates($latitude, $longitude);
$weather = $weatherService->byGeographicCoordinates($coordinates);

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
$coordinates = new GeographicCoordinates($latitude, $longitude);
$cluster = new Cluster();
$cityCount = new CityCount();
$weather = $weatherService->inCycle($coordinates, $cluster, $cityCount);

// Several city ids
$cityIdOne = new CityId(524901);
$cityIdTwo = new CityId(703448);
$cityIdThree = new CityId(2643743);
$cityIds = new CityIds([$cityIdOne, $cityIdTwo, $cityIdThree]);
$weather = $weatherService->severalCityIds($cityIds);

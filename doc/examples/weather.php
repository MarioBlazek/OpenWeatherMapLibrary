<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$configuration = new \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration("token");
$cacheConfiguration = new \Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration(\Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration::NO_CACHE);

$factory = new \Marek\OpenWeatherMap\Factory\WeatherFactory($configuration, $cacheConfiguration);

$weatherService = $factory->createWeatherService();

// By city name
$cityName = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName('Zagreb');
$weather = $weatherService->byCityName($cityName);

// By city id
$cityId = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId(2172797);
$weather = $weatherService->byCityId($cityId);

// By geographic coordinates
$latitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude(35);
$longitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude(139);
$weather = $weatherService->byGeographicCoordinates($latitude, $longitude);

// By zip code
$zipCode = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode(94040, 'us');
$weather = $weatherService->byZipCode($zipCode);

// By rectangle zone
$bbox = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\BoundingBox(12, 32, 15, 37, 10);
$cluster = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster();
$weather = $weatherService->withinARectangleZone($bbox, $cluster);

// By cycle
$latitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude(55.5);
$longitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude(37.5);
$cluster = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster();
$cityCount = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityCount();
$weather = $weatherService->inCycle($latitude, $longitude, $cluster, $cityCount);

// Several city ids
$cityIdOne = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId(524901);
$cityIdTwo = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId(703448);
$cityIdThree = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId(2643743);
$cityIds = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityIds([$cityIdOne, $cityIdTwo, $cityIdThree]);
$weather = $weatherService->severalCityIds($cityIds);

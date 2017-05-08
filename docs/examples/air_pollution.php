<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$configuration = new \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration("token");
$cacheConfiguration = new \Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration(\Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration::NO_CACHE);

$factory = new \Marek\OpenWeatherMap\Factory\WeatherFactory($configuration, $cacheConfiguration);

$airPollutionService = $factory->createAirPollutionService();

$coordinates = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates(35, 139);
$datetime = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime();
$airPollution = $airPollutionService->fetchCarbonMonoxideData($coordinates, $datetime);

$coordinates = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates(0.0, 10);
$datetime = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime();
$airPollution = $airPollutionService->fetchNitrogenDioxideData($coordinates, $datetime);

$coordinates = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates(35, 139);
$datetime = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime();
$airPollution = $airPollutionService->fetchOzoneData($coordinates, $datetime);

$coordinates = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates(35, 139);
$datetime = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime();
$airPollution = $airPollutionService->fetchSulfurDioxideData($coordinates, $datetime);

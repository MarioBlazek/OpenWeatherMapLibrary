<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$configuration = new \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration("token");
$cacheConfiguration = new \Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration(\Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration::NO_CACHE);

$factory = new \Marek\OpenWeatherMap\Factory\WeatherFactory($configuration, $cacheConfiguration);

$ultravioletIndexService = $factory->createUltravioletIndexService();

$coordinates = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates(40.7, -74.2);
$datetime = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime();
$ultravioletIndex = $ultravioletIndexService->fetchUltravioletIndex($coordinates, $datetime);

dump($ultravioletIndex);

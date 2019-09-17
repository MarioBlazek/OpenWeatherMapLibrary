<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$key = require_once __DIR__ . '/api_key.php';

$configuration = new \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration($key);
$cache = new \Symfony\Component\Cache\Adapter\FilesystemAdapter();
$handler = new \Marek\OpenWeatherMap\Core\Cache\SymfonyCache($cache);

$factory = new \Marek\OpenWeatherMap\Factory\WeatherFactory($configuration, $handler);

$ultravioletIndexService = $factory->createUltravioletIndexService();

$coordinates = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates(40.7, -74.2);
$datetime = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime();
$ultravioletIndex = $ultravioletIndexService->fetchUltravioletIndex($coordinates, $datetime);

<?php

use Marek\OpenWeatherMap\API\Constraints\UnitsFormat;
use Marek\OpenWeatherMap\API\Constraints\Language;
use Marek\OpenWeatherMap\API\Constraints\SearchAccuracy;
use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Marek\OpenWeatherMap\Core\Cache\SymfonyCache;
use Marek\OpenWeatherMap\Factory\WeatherFactory;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

require_once __DIR__ . '/../../vendor/autoload.php';

$key = require_once __DIR__ . '/api_key.php';

$configuration = new APIConfiguration(
    $key,
    UnitsFormat::METRIC,
    Language::ENGLISH,
    SearchAccuracy::ACCURATE
);
$cache = new FilesystemAdapter();
$handler = new SymfonyCache($cache);

$factory = new WeatherFactory($configuration, $handler);


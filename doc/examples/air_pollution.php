<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Marek\OpenWeatherMap\Constraints\Language;
use Marek\OpenWeatherMap\Constraints\SearchAccuracy;
use Marek\OpenWeatherMap\Constraints\UnitsFormat;
use Marek\OpenWeatherMap\Core\Cache\SymfonyCache;
use Marek\OpenWeatherMap\Factory\WeatherFactory;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

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

$airPollutionService = $factory->createAirPollutionService();

$coordinates = new GeographicCoordinates(0.0, 10.0);
$dt = new \DateTime();
$dt->setDate(2017, 1, 26);
$dt->setTime(1, 4, 15);

$datetime = new DateTime($dt);
$airPollution = $airPollutionService->fetchCarbonMonoxideData($coordinates, $datetime);

dump($airPollution);
die();

$airPollution = $airPollutionService->fetchNitrogenDioxideData($coordinates, $datetime);

$coordinates = new GeographicCoordinates(35, 139);
$datetime = new DateTime(new \DateTime('now'));
$airPollution = $airPollutionService->fetchOzoneData($coordinates, $datetime);

$coordinates = new GeographicCoordinates(35, 139);
$datetime = new DateTime(new \DateTime('now'));
$airPollution = $airPollutionService->fetchSulfurDioxideData($coordinates, $datetime);

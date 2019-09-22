<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\Constraints\UnitsFormat;
use Marek\OpenWeatherMap\Constraints\Language;
use Marek\OpenWeatherMap\Constraints\SearchAccuracy;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Period;
use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Marek\OpenWeatherMap\Core\Cache\SymfonyCache;
use Marek\OpenWeatherMap\Factory\WeatherFactory;

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

$ultravioletIndexService = $factory->createUltravioletIndexService();

$coordinates = new GeographicCoordinates(40.7, -74.2);
$daysCount = new DaysCount(7);

$start = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTimeStart(new \DateTime('-2 days'));
$end = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTimeEnd(new \DateTime());

$period = new Period($start, $end);
$ultravioletIndex = $ultravioletIndexService->fetchCurrentUltravioletIndex($coordinates);

$aggregateUltravioletIndex = $ultravioletIndexService->fetchForecastUltravioletIndex($coordinates, $daysCount);

$aggregateUltravioletIndex = $ultravioletIndexService->fetchHistoricalUltravioletIndex($coordinates, $period, $daysCount);

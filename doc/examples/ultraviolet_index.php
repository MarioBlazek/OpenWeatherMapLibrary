<?php

require_once __DIR__ . '/bootstrap.php';

use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Period;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTimeStart;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTimeEnd;

$ultravioletIndexService = $factory->createUltravioletIndexService();

$latitude = new Latitude(40.7);
$longitude = new Longitude(-74.2);
$coordinates = new GeographicCoordinates($latitude, $longitude);
$daysCount = new DaysCount(7);

$start = new DateTimeStart(new \DateTime('-2 days'));
$end = new DateTimeEnd(new \DateTime());

$period = new Period($start, $end);
$ultravioletIndex = $ultravioletIndexService->fetchCurrentUltravioletIndex($coordinates);

$aggregateUltravioletIndex = $ultravioletIndexService->fetchForecastUltravioletIndex($coordinates, $daysCount);

$aggregateUltravioletIndex = $ultravioletIndexService->fetchHistoricalUltravioletIndex($coordinates, $period, $daysCount);

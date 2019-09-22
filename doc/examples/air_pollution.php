<?php

require_once __DIR__ . '/bootstrap.php';

use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;

$airPollutionService = $factory->createAirPollutionService();

$latitude = new Latitude(35);
$longitude = new Longitude(139);
$coordinates = new GeographicCoordinates($latitude, $longitude);

$dt = new \DateTime();
$dt->setDate(2017, 1, 26);
$dt->setTime(1, 4, 15);

$datetime = new DateTime($dt);

$airPollution = $airPollutionService->fetchCarbonMonoxideData($coordinates, $datetime);

$airPollution = $airPollutionService->fetchNitrogenDioxideData($coordinates, $datetime);

$airPollution = $airPollutionService->fetchOzoneData($coordinates, $datetime);

$airPollution = $airPollutionService->fetchSulfurDioxideData($coordinates, $datetime);

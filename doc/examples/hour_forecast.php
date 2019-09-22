<?php

require_once __DIR__ . '/bootstrap.php';

use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;

$hourForecastService = $factory->createHourForecastService();

$cityName = new CityName('Zagreb');
$hourForecast = $hourForecastService->fetchForecastByCityName($cityName);

$cityId = new CityId(2172797);
$hourForecast = $hourForecastService->fetchForecastByCityId($cityId);

$zipCode = new ZipCode(94040, 'us');
$hourForecast = $hourForecastService->fetchForecastByZipCode($zipCode);

$latitude = new Latitude(35);
$longitude = new Longitude(139);
$coordinates = new GeographicCoordinates($latitude, $longitude);
$hourForecast = $hourForecastService->fetchForecastByCityGeographicCoordinates($coordinates);

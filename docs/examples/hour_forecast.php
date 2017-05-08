<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$configuration = new \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration("token");
$cacheConfiguration = new \Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration(\Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration::NO_CACHE);

$factory = new \Marek\OpenWeatherMap\Factory\WeatherFactory($configuration, $cacheConfiguration);

$hourForecastService = $factory->createHourForecastService();

//$cityName = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName('Zagreb');
//$hourForecast = $hourForecastService->fetchForecastByCityName($cityName);


$cityId = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId(2172797);
$hourForecast = $hourForecastService->fetchForecastByCityId($cityId);

dump($hourForecast);
/*
$zipCode = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode(94040, 'us');
$hourForecast = $hourForecastService->fetchForecastByZipCode($zipCode);

$latitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude(35);
$longitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude(139);
$hourForecast = $hourForecastService->fetchForecastByCityGeographicCoordinates($latitude, $longitude);
*/

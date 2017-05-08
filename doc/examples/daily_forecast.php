<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$configuration = new \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration("token");
$cacheConfiguration = new \Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration(\Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration::NO_CACHE);

$factory = new \Marek\OpenWeatherMap\Factory\WeatherFactory($configuration, $cacheConfiguration);

$dailyForecastService = $factory->createDailyForecastService();

$cityName = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName('Zagreb');
$daysCount = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount();
$dailyForecast = $dailyForecastService->fetchForecastByCityName($cityName, $daysCount);

$cityId = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId(2172797);
$daysCount = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount();
$dailyForecast = $dailyForecastService->fetchForecastByCityId($cityId, $daysCount);

$zipCode = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode(94040, 'us');
$daysCount = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount();
$dailyForecast = $dailyForecastService->fetchForecastByZipCode($zipCode, $daysCount);

$latitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude(35);
$longitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude(139);
$daysCount = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount();
$dailyForecast = $dailyForecastService->fetchForecastByCityGeographicCoordinates($latitude, $longitude, $daysCount);

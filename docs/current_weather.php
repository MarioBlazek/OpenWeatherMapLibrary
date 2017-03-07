<?php

require __DIR__ . "/../vendor/autoload.php";


$factory = new \Marek\OpenWeatherLibrary\Factory\UrlFactory(
    'http://api.openweathermap.org',
    '0690adc613d654b49fffc1f7fa4829ff'
);

$httpClient = new \Marek\OpenWeatherLibrary\Http\Client\HttpClient();
$hydrator = new \Marek\OpenWeatherLibrary\Hydrator\ObjectPropertyTreeHydrator();

$weather = new \Marek\OpenWeatherLibrary\Core\Services\CurrentWeatherService(
    $httpClient,
    $factory,
    new \Marek\OpenWeatherLibrary\Cache\NoCache(),
    $hydrator
);

//$cityName = new \Marek\OpenWeatherLibrary\API\Value\CityName('London');
//$weather = $weather->byCityName($cityName);
//
//var_dump($weather);

//$cityId = 3186886;
//$weather->byCityId($cityId);

//$coordinates = new \Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates(35, 139);
//$weather->byGeographicCoordinates($coordinates);

//$zipCode = new \Marek\OpenWeatherLibrary\API\Value\ZipCode(10001);
//$weather->byZipCode($zipCode);

//$bbox = new \Marek\OpenWeatherLibrary\API\Value\BoundingBox(12, 32, 15, 37, 10);
//$weather->withinARectangleZone($bbox, \Marek\OpenWeatherLibrary\API\Value\Cluster::YES);

//$coordinates = new \Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates(35, 139);
//$weather->inCycle($coordinates, \Marek\OpenWeatherLibrary\API\Value\Cluster::YES, 10);

//$cityIds = [524901, 703448, 2643743];
//$weather->severalCityIds($cityIds);

<?php

require __DIR__ . "/../vendor/autoload.php";


$factory = new \Marek\OpenWeatherLibrary\Factory\UrlFactory(
    \Marek\OpenWeatherLibrary\API\Services\AirPollution::BASE_URL,
    '0690adc613d654b49fffc1f7fa4829ff'
);

$httpClient = new \Marek\OpenWeatherLibrary\Http\Client\HttpClient();
$hydrator = new \Marek\OpenWeatherLibrary\Hydrator\ObjectPropertyTreeHydrator();
$cache = new \Marek\OpenWeatherLibrary\Cache\NoCache();

$airPullution = new \Marek\OpenWeatherLibrary\Core\Services\AirPollutionService(
    $httpClient,
    $factory,
    $cache,
    $hydrator
);

// http://api.openweathermap.org/pollution/v1/co/{location}/{datetime}.json?appid={api_key}

$coords = new \Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates(0.0, 10.0);
$dateTime = new \Marek\OpenWeatherLibrary\API\Value\Datetime();

//$results = $airPullution->fetchOzoneData($coords, $dateTime);
//$results = $airPullution->fetchCarbonMonoxideData($coords, $dateTime);
$results = $airPullution->fetchNitrogenDioxideData($coords, $dateTime);
//$results = $airPullution->fetchSulfurDioxideData($coords, $dateTime);

var_dump($results);

<?php

require __DIR__ . "/../vendor/autoload.php";


$factory = new \Marek\OpenWeatherLibrary\Factory\UrlFactory(
    \Marek\OpenWeatherLibrary\API\Services\UltravioletIndex::BASE_URL,
    '0690adc613d654b49fffc1f7fa4829ff'
);

$httpClient = new \Marek\OpenWeatherLibrary\Http\Client\HttpClient();
$hydrator = new \Marek\OpenWeatherLibrary\Hydrator\UltravioletIndexHydrator();
$cache = new \Marek\OpenWeatherLibrary\Cache\NoCache();

$ultravioletIndexService = new \Marek\OpenWeatherLibrary\Core\Services\UltravioletIndexService(
    $httpClient,
    $factory,
    $cache,
    $hydrator
);

$coords = new \Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates(0.0, 10.0);
$datetime = new \Marek\OpenWeatherLibrary\API\Value\Datetime();

$result = $ultravioletIndexService->fetchUltravioletIndex($coords, $datetime);

var_dump($result);

<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Marek\OpenWeatherMap\Factory\DenormalizerFactory;
use Marek\OpenWeatherMap\Denormalizer\UltravioletIndexDenormalizer;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\AggregatedUltravioletIndex;

$data = readJson('uv_index', 'history');

$denormalizerFactory = new DenormalizerFactory();
$denormalizer = new UltravioletIndexDenormalizer($denormalizerFactory->create());

/** @var \Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex $res */
$res = $denormalizer->denormalize($data, new AggregatedUltravioletIndex());

dump($res);

function readJson(string $service, string $file): array
{
    $file = __DIR__ . '/responses/' . $service . '/' . $file . '.json';

    if (!file_exists($file)) {
        throw new InvalidArgumentException('Invalid argument provided for json file.');
    }

    try {
        return json_decode(
            file_get_contents($file), true, 512, JSON_THROW_ON_ERROR
        );
    } catch (JsonException $exception) {
        throw new \Exception('Invalid JSON provided.');
    }
}

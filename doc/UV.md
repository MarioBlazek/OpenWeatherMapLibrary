# UV Index


### Bootstrap

```php
<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$key = require_once __DIR__ . '/api_key.php';

// cache response for 30 seconds
$ttl = 30;

$configuration = new \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration($key);
$cache = new \Symfony\Component\Cache\Adapter\FilesystemAdapter();
$handler = new \Marek\OpenWeatherMap\Core\Cache\SymfonyCache($cache, $ttl);

$factory = new \Marek\OpenWeatherMap\Factory\WeatherFactory($configuration, $handler);

/** @var \Marek\OpenWeatherMap\API\Weather\Services\UltravioletIndexInterface $ultravioletIndexService */
$ultravioletIndexService = $factory->createUltravioletIndexService();
```

### Current UV data for one location

Link to openweathermap.org API [doc](https://openweathermap.org/api/uvi#geo).

```php
$coordinates = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates(40.7, -74.2);
$datetime = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime();

$ultravioletIndex = $ultravioletIndexService->fetchUltravioletIndex($coordinates, $datetime);
```

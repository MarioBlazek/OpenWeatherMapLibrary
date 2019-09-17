# Current weather data


### Bootstrap

```php
require_once __DIR__ . '/../../vendor/autoload.php';

$key = require_once __DIR__ . '/api_key.php';

// cache response for 30 seconds
$ttl = 30;
$configuration = new \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration($key);
$cache = new \Symfony\Component\Cache\Adapter\FilesystemAdapter();
$handler = new \Marek\OpenWeatherMap\Core\Cache\SymfonyCache($cache, $ttl);

$factory = new \Marek\OpenWeatherMap\Factory\WeatherFactory($configuration, $handler);

/** @var \Marek\OpenWeatherMap\API\Weather\Services\WeatherInterface $weatherService */
$weatherService = $factory->createWeatherService();
```

### Weather by city name

Link to openweathermap.org API [doc](https://openweathermap.org/current#name).

```php
$cityName = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName('Zagreb');
$weather = $weatherService->byCityName($cityName);
```


### Weather by city id

Link to openweathermap.org API [doc](https://openweathermap.org/current#cityid).

```php
$cityId = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId(2172797);
$weather = $weatherService->byCityId($cityId);
```

### Weather by geographic coordinates

Link to openweathermap.org API [doc](https://openweathermap.org/current#geo).

```php
$latitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude(35);
$longitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude(139);
$weather = $weatherService->byGeographicCoordinates($latitude, $longitude);
```

### Weather by zip code

Link to openweathermap.org API [doc](https://openweathermap.org/current#zip).

```php
$zipCode = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode(94040, 'us');
$weather = $weatherService->byZipCode($zipCode);
```

### Weather by rectangle zone

Link to openweathermap.org API [doc](https://openweathermap.org/current#rectangle).

```php
$bbox = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\BoundingBox(12, 32, 15, 37, 10);
$cluster = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster();
$weather = $weatherService->withinARectangleZone($bbox, $cluster);
```

### Weather by cycle

Link to openweathermap.org API [doc](https://openweathermap.org/current#cycle).

```php
$latitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Latitude(55.5);
$longitude = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Longitude(37.5);
$cluster = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster();
$cityCount = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityCount();
$weather = $weatherService->inCycle($latitude, $longitude, $cluster, $cityCount);
```

### Weather for several city ids

Link to openweathermap.org API [doc](https://openweathermap.org/current#severalid).

```php
$cityIdOne = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId(524901);
$cityIdTwo = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId(703448);
$cityIdThree = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId(2643743);
$cityIds = new \Marek\OpenWeatherMap\API\Value\Parameter\Input\CityIds([$cityIdOne, $cityIdTwo, $cityIdThree]);
$weather = $weatherService->severalCityIds($cityIds);
```

<?php

namespace Marek\OpenWeatherMap\API\Cache;

use Marek\OpenWeatherMap\API\Exception\ItemNotFoundException;

interface HandlerInterface
{
    /**
     * @const string
     */
    const CACHE_KEY_PREFIX = 'marek-openweathermap-';

    /**
     * Returns if there is a valid cache entry for provided cache key.
     *
     * @param string $cacheKey
     *
     * @return bool
     */
    public function has($cacheKey);

    /**
     * Returns the data from cache entry for provided cache key.
     *
     * @param string $cacheKey
     *
     * @throws ItemNotFoundException
     *
     * @return string
     */
    public function get($cacheKey);

    /**
     * Sets the data to cache entry for provided cache key.
     *
     * @param string $cacheKey
     * @param string $data
     */
    public function set($cacheKey, $data);
}

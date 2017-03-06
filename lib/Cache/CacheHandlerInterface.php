<?php

namespace Marek\OpenWeatherLibrary\Cache;

interface CacheHandlerInterface
{
    /**
     * @const string
     */
    const CACHE_KEY_PREFIX = 'marek-openweathermap';

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
     * @return mixed
     */
    public function get($cacheKey);

    /**
     * Sets the data to cache entry for provided cache key.
     *
     * @param string $cacheKey
     * @param mixed $data
     */
    public function set($cacheKey, $data);
}

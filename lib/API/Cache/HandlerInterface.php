<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Cache;

use Marek\OpenWeatherMap\API\Exception\ItemNotFoundException;

interface HandlerInterface
{
    /**
     * @const string
     */
    public const CACHE_KEY_PREFIX = 'marek-openweathermap-';

    /**
     * Returns if there is a valid cache entry for provided cache key.
     *
     * @param string $cacheKey
     *
     * @return bool
     */
    public function has(string $cacheKey): bool;

    /**
     * Returns the data from cache entry for provided cache key.
     *
     * @param string $cacheKey
     *
     * @throws ItemNotFoundException
     *
     * @return array
     */
    public function get(string $cacheKey): array;

    /**
     * Sets the data to cache entry for provided cache key.
     *
     * @param string $cacheKey
     * @param array $data
     */
    public function set(string $cacheKey, array $data): void;
}

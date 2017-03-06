<?php

namespace Marek\OpenWeatherLibrary\Cache;

class NoCache implements CacheHandlerInterface
{
    /**
     * @inheritdoc
     */
    public function has($cacheKey)
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function get($cacheKey)
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function set($cacheKey, $data)
    {
    }
}

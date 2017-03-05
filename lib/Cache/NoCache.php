<?php

namespace Marek\OpenWeatherLibrary\Cache;

class NoCache implements HandlerInterface
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

<?php

namespace Marek\OpenWeatherMap\Core\Cache;

use Marek\OpenWeatherMap\API\Exception\ItemNotFoundException;
use Marek\OpenWeatherMap\API\Cache\HandlerInterface;

class NoCache implements HandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function has($cacheKey)
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function get($cacheKey)
    {
        throw new ItemNotFoundException("Item with key:{$cacheKey} not found.");
    }

    /**
     * {@inheritdoc}
     */
    public function set($cacheKey, $data)
    {
    }
}

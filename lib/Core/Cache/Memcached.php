<?php

namespace Marek\OpenWeatherMap\Core\Cache;

use Memcached as InnerMemcached;
use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\API\Exception\ItemNotFoundException;

class Memcached implements HandlerInterface
{
    /**
     * @var InnerMemcached
     */
    protected $memcached;

    /**
     * @var int
     */
    protected $ttl;

    /**
     * Memcached constructor.
     *
     * @param InnerMemcached $memcached
     * @param int $ttl
     */
    public function __construct(InnerMemcached $memcached, $ttl)
    {
        $this->memcached = $memcached;
        $this->memcached->setOption(InnerMemcached::OPT_PREFIX_KEY, self::CACHE_KEY_PREFIX);
        $this->memcached->setOption(InnerMemcached::OPT_LIBKETAMA_COMPATIBLE, true);
        $this->ttl = $ttl;
    }

    /**
     * {@inheritdoc}
     */
    public function has($cacheKey)
    {
        return $this->memcached->get($cacheKey) !== false;
    }

    /**
     * {@inheritdoc}
     */
    public function get($cacheKey)
    {
        $data = $this->memcached->get($cacheKey);

        if (!empty($data)) {
            return $data;
        }

        throw new ItemNotFoundException("Item with key:{$cacheKey} not found.");
    }

    /**
     * {@inheritdoc}
     */
    public function set($cacheKey, $data)
    {
        // Memcached considers TTL smaller than 60 * 60 * 24 * 30 (number of seconds in a month)
        // as a relative value, so we will make sure that it is converted to a timestamp for consistent
        // usage later on
        if ($this->ttl < 60 * 60 * 24 * 30) {
            $this->ttl = time() + (int) $this->ttl;
        }

        $this->memcached->set($cacheKey, $data, $this->ttl);
    }
}

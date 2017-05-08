<?php

namespace Marek\OpenWeatherMap\API\Value\Configuration;

class CacheConfiguration
{
    const NO_CACHE = 'null';

    const MEMCACHED = 'memcached';

    /**
     * @var string
     */
    protected $handler;

    /**
     * @var int
     */
    protected $ttl;

    /**
     * @var null|string
     */
    protected $server;

    /**
     * @var null|string
     */
    protected $port;

    /**
     * CacheConfiguration constructor.
     *
     * @param string $handler
     * @param int $ttl
     * @param null|string $server
     * @param null|string $port
     */
    public function __construct($handler, $ttl = 3600, $server = null, $port = null)
    {
        $this->handler = $handler;
        $this->ttl = $ttl;
        $this->server = $server;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @return int
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @return null|string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @return null|string
     */
    public function getPort()
    {
        return $this->port;
    }
}

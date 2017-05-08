<?php

namespace Marek\OpenWeatherMap\Factory;

use Marek\OpenWeatherMap\Core\Cache\NoCache;
use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration;
use Marek\OpenWeatherMap\Core\Cache\Memcached as MemcachedHandler;

class CacheFactory
{
    /**
     * @var CacheConfiguration
     */
    protected $configuration;

    /**
     * CacheFactory constructor.
     *
     * @param CacheConfiguration $configuration
     */
    public function __construct(CacheConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Returns cache handle implementation based on configuration
     *
     * @return HandlerInterface
     *
     * @throws \Exception
     */
    public function create()
    {
        if ($this->configuration->getHandler() === CacheConfiguration::MEMCACHED) {

            if (class_exists(\Memcached::class)) {
                throw new \Exception("Memcached not installed.");
            }

            $memcached = new \Memcached();
            $memcached->addServer($this->configuration->getServer(), $this->configuration->getPort());

            return new MemcachedHandler($memcached, $this->configuration->getTtl());


        }

        return new NoCache();
    }
}

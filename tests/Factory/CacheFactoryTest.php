<?php

namespace Marek\OpenWeatherMap\Tests\Factory;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\API\Value\Configuration\CacheConfiguration;
use Marek\OpenWeatherMap\Core\Cache\Memcached;
use Marek\OpenWeatherMap\Core\Cache\NoCache;
use Marek\OpenWeatherMap\Factory\CacheFactory;
use PHPUnit\Framework\TestCase;

class CacheFactoryTest extends TestCase
{
    public function testItReturnsCacheHandler()
    {
        $cacheConfig = new CacheConfiguration(CacheConfiguration::NO_CACHE);
        $factory = new CacheFactory($cacheConfig);

        $handler = $factory->create();

        $this->assertInstanceOf(HandlerInterface::class, $handler);
        $this->assertInstanceOf(NoCache::class, $handler);
    }

    public function testItReturnsMemcachedHandler()
    {
        if (!extension_loaded(CacheConfiguration::MEMCACHED)) {
            $this->markTestSkipped();
        }

        $cacheConfig = new CacheConfiguration(CacheConfiguration::MEMCACHED, 3600, '127.0.0.1', '11211');
        $factory = new CacheFactory($cacheConfig);

        $handler = $factory->create();

        $this->assertInstanceOf(HandlerInterface::class, $handler);
        $this->assertInstanceOf(Memcached::class, $handler);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Memcached not installed.
     */
    public function testThrowExceptionIfMemcachedIsNotInstalled()
    {
        if (extension_loaded(CacheConfiguration::MEMCACHED)) {
            $this->markTestSkipped();
        }

        $cacheConfig = new CacheConfiguration(CacheConfiguration::MEMCACHED, 3600, '127.0.0.1', '11211');
        $factory = new CacheFactory($cacheConfig);

        $factory->create();
    }
}

<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Core\Cache;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\Core\Cache\Memcached;
use PHPUnit\Framework\TestCase;

class MemcachedTest extends TestCase
{
    /**
     * @var Memcached
     */
    protected $cache;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $memcached;

    /**
     * @var int
     */
    protected $ttl;

    protected function setUp()
    {
        if (PHP_MAJOR_VERSION === 5) {
            self::markTestSkipped();
        }

        $this->memcached = $this->getMockBuilder(\Memcached::class)
            ->disableOriginalConstructor()
            ->setMethods(['get', 'set', 'setOption'])
            ->getMock();

        $this->ttl = 3600;

        $this->cache = new Memcached($this->memcached, $this->ttl);
    }

    public function testInstanceOfCacheHandler()
    {
        self::assertInstanceOf(HandlerInterface::class, $this->cache);
    }

    public function testSet()
    {
        $this->memcached->expects(self::once())
            ->method('set')
            ->with('key', 'data', time() + (int) $this->ttl);

        $this->cache->set('key', 'data');
    }

    public function testHasFalse()
    {
        $this->memcached->expects(self::once())
            ->method('get')
            ->with('key')
            ->willReturn(false);

        self::assertFalse($this->cache->has('key'));
    }

    public function testHasTrue()
    {
        $this->memcached->expects(self::once())
            ->method('get')
            ->with('key')
            ->willReturn(true);

        self::assertTrue($this->cache->has('key'));
    }

    public function testGet()
    {
        $this->memcached->expects(self::once())
            ->method('get')
            ->with('key')
            ->willReturn('data');

        self::assertSame('data', $this->cache->get('key'));
    }

    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\ItemNotFoundException
     * @expectedExceptionMessage Item with key:key not found.
     */
    public function testGetWithException()
    {
        $this->memcached->expects(self::once())
            ->method('get')
            ->with('key')
            ->willReturn(null);

        $this->cache->get('key');
    }
}

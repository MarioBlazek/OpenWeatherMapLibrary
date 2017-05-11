<?php

namespace Marek\OpenWeatherMap\Tests\Core\Cache;

use Marek\OpenWeatherMap\Core\Cache\NoCache;
use PHPUnit\Framework\TestCase;

class NoCacheTest extends TestCase
{
    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\ItemNotFoundException
     * @expectedExceptionMessage Item with key:key not found.
     */
    public function testCache()
    {
        $cache = new NoCache();

        $this->assertFalse($cache->has('key'));
        $this->assertFalse($cache->has('key1'));
        $this->assertFalse($cache->has('key2'));

        $cache->set('key', 'data');
        $cache->set('key1', 'data2');

        $cache->get('key');
    }
}

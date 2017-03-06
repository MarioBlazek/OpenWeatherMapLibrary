<?php

namespace Marek\OpenWeatherLibrary\Core;

use Marek\OpenWeatherLibrary\Cache\CacheHandlerInterface;
use Marek\OpenWeatherLibrary\Factory\UrlFactory;
use Marek\OpenWeatherLibrary\Http\Client\HttpClientInterface;
use Marek\OpenWeatherLibrary\Hydrator\HydratorInterface;

abstract class BaseService
{
    /**
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * @var UrlFactory
     */
    protected $factory;

    /**
     * @var CacheHandlerInterface
     */
    protected $cache;

    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * BaseService constructor.
     *
     * @param HttpClientInterface $client
     * @param UrlFactory $factory
     * @param CacheHandlerInterface $cache
     * @param HydratorInterface $hydrator
     */
    public function __construct(
        HttpClientInterface $client,
        UrlFactory $factory,
        CacheHandlerInterface $cache,
        HydratorInterface $hydrator
    )
    {
        $this->client = $client;
        $this->factory = $factory;
        $this->cache = $cache;
        $this->hydrator = $hydrator;
    }

    /**
     * @param string $url
     *
     * @return array
     */
    protected function get($url)
    {
        if ($this->cache->has($url)) {
            return $this->cache->get($url);
        }

        $response = $this->client->get($url);

        $this->cache->set($url, $response->getData());

        return $response->getData();
    }
}

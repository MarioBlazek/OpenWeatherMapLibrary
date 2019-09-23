<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Core\Weather;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\API\Exception\APIException;
use Marek\OpenWeatherMap\API\Exception\ExceptionThrower;
use Marek\OpenWeatherMap\Denormalizer\DenormalizerInterface;
use Marek\OpenWeatherMap\Factory\UrlFactory;
use Marek\OpenWeatherMap\Http\Client\HttpClientInterface;

abstract class Base
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
     * @var HandlerInterface
     */
    protected $handler;

    /**
     * @var \Marek\OpenWeatherMap\Denormalizer\DenormalizerInterface
     */
    protected $denormalizer;

    /**
     * Base constructor.
     *
     * @param HttpClientInterface $client
     * @param UrlFactory $factory
     * @param HandlerInterface $handler
     * @param \Marek\OpenWeatherMap\Denormalizer\DenormalizerInterface $hydrator
     */
    public function __construct(HttpClientInterface $client, UrlFactory $factory, HandlerInterface $handler, DenormalizerInterface $denormalizer)
    {
        $this->client = $client;
        $this->factory = $factory;
        $this->handler = $handler;
        $this->denormalizer = $denormalizer;
    }

    /**
     * @param string $url
     *
     * @throws APIException
     *
     * @return array
     */
    protected function getResult(string $url): array
    {
        if ($this->handler->has($url)) {
            return $this->handler->get($url);
        }

        $response = $this->client->get($url);

        ExceptionThrower::throwException($response->getStatusCode(), $response->getMessage());

        return $response->getData();
    }
}

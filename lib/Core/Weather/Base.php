<?php

namespace Marek\OpenWeatherMap\Core\Weather;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\API\Exception\BadRequestException;
use Marek\OpenWeatherMap\API\Exception\ExceptionThrower;
use Marek\OpenWeatherMap\API\Exception\ForbiddenException;
use Marek\OpenWeatherMap\API\Exception\NotFoundException;
use Marek\OpenWeatherMap\API\Exception\APIException;
use Marek\OpenWeatherMap\Factory\UrlFactory;
use Marek\OpenWeatherMap\Http\Client\HttpClientInterface;
use Marek\OpenWeatherMap\Hydrator\HydratorInterface;

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
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * Base constructor.
     *
     * @param HttpClientInterface $client
     * @param UrlFactory $factory
     * @param HandlerInterface $handler
     * @param HydratorInterface $hydrator
     */
    public function __construct(HttpClientInterface $client, UrlFactory $factory, HandlerInterface $handler, HydratorInterface $hydrator)
    {
        $this->client = $client;
        $this->factory = $factory;
        $this->handler = $handler;
        $this->hydrator = $hydrator;
    }

    /**
     * @param string $url
     *
     * @return string
     *
     * @throws APIException
     */
    protected function getResult($url)
    {
        $hash = md5($url);

        if ($this->handler->has($hash)) {
            return $this->handler->get($hash);
        }

        $response = $this->client->get($url);

        ExceptionThrower::throwException($response->getStatusCode(), $response->getMessage());

        return (string)$response;
    }
}

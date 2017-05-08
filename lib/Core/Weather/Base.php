<?php

namespace Marek\OpenWeatherMap\Core\Weather;

use Marek\OpenWeatherMap\API\Cache\HandlerInterface;
use Marek\OpenWeatherMap\API\Exception\BadRequestException;
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

        if ($response->getStatusCode() == 404) {
            throw new NotFoundException($response->getMessage());
        } else if ($response->getStatusCode() == 400) {
            throw new BadRequestException($response->getMessage());
        } else if ($response->getStatusCode() == 401) {
            throw new ForbiddenException($response->getMessage());
        }

        dump($response->getStatusCode());


        return (string)$response;
    }

//    /**
//     * Helper method.
//     *
//     * @param string $baseUrl
//     * @param string $queryPart
//     *
//     * @throws NotFoundException
//     * @throws NotAuthorizedException
//     *
//     * @return mixed
//     */
//    protected function getResult($baseUrl, $queryPart)
//    {
//        $url = $baseUrl . $queryPart;
//
//        $hash = md5($url);
//
//        if ($this->cacheService->has($hash)) {
//            return $this->cacheService->get($hash);
//        }
//        $response = $this->client->get($url);
//
//        if (!$response->isAuthorized()) {
//            throw new NotAuthorizedException($response->getMessage());
//        }
//
//        if (!$response->isOk()) {
//            throw new NotFoundException($response->getMessage());
//        }
//
//        $this->cacheService->set($hash, (string) $response);
//
//        return (string) $response;
//    }
}

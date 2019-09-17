<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Http\Client;

use Marek\OpenWeatherMap\Http\Response\JsonResponse;
use Marek\OpenWeatherMap\Http\Response\ResponseInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface as BaseHttpClientInterface;

final class SymfonyHttpClient implements HttpClientInterface
{
    /**
     * @var BaseHttpClientInterface
     */
    protected $innerClient;

    public function __construct(BaseHttpClientInterface $innerClient)
    {
        $this->innerClient = $innerClient;
    }

    public function get(string $url): ResponseInterface
    {
        $response = $this->innerClient->request('GET', $url);


        return new JsonResponse(
            $response->getContent(), $response->getStatusCode()
        );
    }
}

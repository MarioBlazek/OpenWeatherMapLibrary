<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Http\Client;

use Marek\OpenWeatherMap\Http\Response\ResponseInterface;

interface HttpClientInterface
{
    /**
     * Performs get request to given URL.
     *
     * @param string $url
     *
     * @return \Marek\OpenWeatherMap\Http\Response\ResponseInterface
     */
    public function get(string $url): ResponseInterface;
}

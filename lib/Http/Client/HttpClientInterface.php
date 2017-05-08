<?php

namespace Marek\OpenWeatherMap\Http\Client;

use Marek\OpenWeatherMap\Http\Response\ResponseInterface;

interface HttpClientInterface
{
    /**
     * Performs get request to given URL.
     *
     * @param string $url
     *
     * @return ResponseInterface
     */
    public function get($url);
}

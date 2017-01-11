<?php

namespace Marek\OpenWeatherLibrary\Http\Client;

use Marek\OpenWeatherLibrary\Http\Response\ResponseInterface;

interface HttpClientInterface
{
    /**
     * @param string $url
     *
     * @return ResponseInterface
     */
    public function get($url);
}

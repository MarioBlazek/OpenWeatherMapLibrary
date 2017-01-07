<?php

namespace Marek\OpenWeatherLibrary\Http\Client;

interface HttpClientInterface
{
    /**
     * @param string $url
     *
     * @return mixed
     */
    public function get($url);
}

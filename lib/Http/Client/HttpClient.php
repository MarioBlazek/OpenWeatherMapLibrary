<?php

namespace Marek\OpenWeatherMap\Http\Client;

use Marek\OpenWeatherMap\Http\Response\JsonResponse;

class HttpClient implements HttpClientInterface
{
    /**
     * {@inheritdoc}
     */
    public function get($url)
    {
        dump($url);
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_FOLLOWLOCATION, true);

        $response = curl_exec($curlHandle);
        $httpCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);

        curl_close($curlHandle);

        return new JsonResponse($response, $httpCode);
    }
}

<?php

namespace Marek\OpenWeatherLibrary\Converter;

use Marek\OpenWeatherLibrary\API\Value\Response\Response;
use Marek\OpenWeatherLibrary\Http\Response\ResponseInterface;

interface ConverterInterface
{
    /**
     * @param ResponseInterface $response
     *
     * @return Response
     */
    public function convert(ResponseInterface $response);
}

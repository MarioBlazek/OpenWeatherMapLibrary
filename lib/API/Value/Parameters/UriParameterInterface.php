<?php

namespace Marek\OpenWeatherLibrary\API\Value\Parameters;

interface UriParameterInterface extends ParameterInterface
{
    /**
     * @return string
     */
    public function getUriParameterValue();

    /**
     * @return string
     */
    public function getUriParameterName();
}

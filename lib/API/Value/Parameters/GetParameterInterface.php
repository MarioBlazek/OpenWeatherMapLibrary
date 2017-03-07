<?php

namespace Marek\OpenWeatherLibrary\API\Value\Parameters;

interface GetParameterInterface extends ParameterInterface
{
    /**
     * @return string
     */
    public function getGetParameterValue();

    /**
     * @return string
     */
    public function getGetParameterName();
}

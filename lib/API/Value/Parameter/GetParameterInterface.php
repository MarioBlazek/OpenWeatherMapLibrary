<?php

namespace Marek\OpenWeatherMap\API\Value\Parameter;

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

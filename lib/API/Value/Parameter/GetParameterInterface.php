<?php

declare(strict_types=1);

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

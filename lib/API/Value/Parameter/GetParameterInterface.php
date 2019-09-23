<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter;

interface GetParameterInterface extends ParameterInterface
{
    /**
     * Returns value for GET parameter.
     *
     * @return string
     */
    public function getGetParameterValue(): string;

    /**
     * Returns GET parameter identifier.
     *
     * @return string
     */
    public function getGetParameterName(): string;
}

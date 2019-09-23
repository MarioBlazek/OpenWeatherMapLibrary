<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter;

interface UriParameterInterface extends ParameterInterface
{
    /**
     * Returns value for URI parameter
     *
     * @return string
     */
    public function getUriParameterValue(): string;

    /**
     * Returns URI parameter identifier
     *
     * @return string
     */
    public function getUriParameterName(): string;
}

<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter;

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

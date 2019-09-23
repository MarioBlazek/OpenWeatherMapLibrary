<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

class DateTimeStart extends DateTime
{
    public function getGetParameterName(): string
    {
        return 'start';
    }
}

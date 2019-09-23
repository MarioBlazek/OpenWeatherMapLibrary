<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

class DateTimeEnd extends DateTime
{
    public function getGetParameterName(): string
    {
        return 'end';
    }
}

<?php

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

class DateTimeStart extends DateTime
{
    public function getGetParameterName()
    {
        return 'start';
    }
}

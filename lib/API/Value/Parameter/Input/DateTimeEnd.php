<?php

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

class DateTimeEnd extends DateTime
{
    public function getGetParameterName()
    {
        return 'end';
    }
}

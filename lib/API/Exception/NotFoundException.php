<?php

namespace Marek\OpenWeatherMap\API\Exception;

class NotFoundException extends APIException
{
    protected $statusCode = 404;
}

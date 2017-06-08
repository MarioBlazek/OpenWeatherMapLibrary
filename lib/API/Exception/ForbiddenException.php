<?php

namespace Marek\OpenWeatherMap\API\Exception;

class ForbiddenException extends APIException
{
    protected $statusCode = 403;
}

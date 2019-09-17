<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Exception;

class ForbiddenException extends APIException
{
    protected $statusCode = 403;
}

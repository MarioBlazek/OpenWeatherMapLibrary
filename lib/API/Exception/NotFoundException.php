<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Exception;

class NotFoundException extends APIException
{
    protected $statusCode = 404;
}

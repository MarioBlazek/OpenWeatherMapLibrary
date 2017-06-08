<?php

namespace Marek\OpenWeatherMap\API\Exception;

class ExceptionThrower
{
    public static function throwException($statusCode, $message)
    {
        switch ($statusCode) {
            case APIException::FORBIDDEN:
                throw new ForbiddenException($message, APIException::FORBIDDEN);
            case APIException::UNAUTHORIZED:
                throw new UnauthorizedException($message, APIException::UNAUTHORIZED);
            case APIException::NOT_FOUND:
                throw new NotFoundException($message, APIException::NOT_FOUND);
            case APIException::BAD_REQUEST:
                throw new BadRequestException($message, APIException::BAD_REQUEST);
        }
    }
}

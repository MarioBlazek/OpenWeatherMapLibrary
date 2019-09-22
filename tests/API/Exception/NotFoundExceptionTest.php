<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Exception;

use Marek\OpenWeatherMap\API\Exception\APIException;
use Marek\OpenWeatherMap\API\Exception\NotFoundException;
use PHPUnit\Framework\TestCase;

class NotFoundExceptionTest extends TestCase
{
    public function testException()
    {
        $this->expectException(\Marek\OpenWeatherMap\API\Exception\NotFoundException::class);
        $this->expectExceptionMessage('Item not found');

        $exception = new NotFoundException('Item not found', APIException::NOT_FOUND);
        self::assertSame('Item not found', $exception->getAPIMessage());
        self::assertSame(APIException::NOT_FOUND, $exception->getStatusCode());

        throw $exception;
    }
}

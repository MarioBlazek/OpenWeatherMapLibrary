<?php

namespace Marek\OpenWeatherMap\Tests\API\Exception;

use Marek\OpenWeatherMap\API\Exception\APIException;
use Marek\OpenWeatherMap\API\Exception\NotFoundException;
use PHPUnit\Framework\TestCase;

class NotFoundExceptionTest extends TestCase
{
    /**
     * @expectedException \Marek\OpenWeatherMap\API\Exception\NotFoundException
     * @expectedExceptionMessage Item not found
     */
    public function testException()
    {
        $exception = new NotFoundException("Item not found", APIException::NOT_FOUND);
        $this->assertEquals("Item not found", $exception->getAPIMessage());
        $this->assertEquals(APIException::NOT_FOUND, $exception->getStatusCode());

        throw $exception;
    }
}
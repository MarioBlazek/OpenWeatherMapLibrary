<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Http\Response;

use Marek\OpenWeatherMap\Http\Response\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
    public function testResponseWithValidJson()
    {
        $data = [
            'cod' => 404,
            'one' => 'one',
            'two' => 'two',
            'three' => 'three',
            'message' => 'my_message',
        ];

        $encoded = json_encode($data);

        $response = new JsonResponse($encoded, 500);

        self::assertSame($data, $response->getData());
        self::assertSame(404, $response->getStatusCode());
        self::assertFalse($response->isOk());
        self::assertTrue($response->isAuthorized());
        self::assertSame($data['message'], $response->getMessage());
        self::assertSame($encoded, (string) $response);
    }

    public function testResponseWithEmptyJsonMessageAndHttpCode()
    {
        $data = [
            'one' => 'one',
            'two' => 'two',
            'three' => 'three',
        ];
        $code = 200;

        $encoded = json_encode($data);

        $response = new JsonResponse($encoded, $code);

        self::assertSame($data, $response->getData());
        self::assertSame($code, $response->getStatusCode());
        self::assertTrue($response->isOk());
        self::assertTrue($response->isAuthorized());
        self::assertSame('', $response->getMessage());
    }

    public function testResponseWithArrayAsData()
    {
        $data = [
            'one' => 'one',
            'two' => 'two',
            'three' => 'three',
        ];
        $code = 401;

        $response = new JsonResponse($data, $code);

        self::assertSame($data, $response->getData());
        self::assertSame($code, $response->getStatusCode());
        self::assertFalse($response->isOk());
        self::assertFalse($response->isAuthorized());
        self::assertSame('', $response->getMessage());
    }

    public function testResponseWithString()
    {
        $data = '({test})';
        $code = 401;

        $response = new JsonResponse($data, $code);

        self::assertSame($data, (string) $response);
        self::assertSame($code, $response->getStatusCode());
        self::assertFalse($response->isOk());
        self::assertFalse($response->isAuthorized());
        self::assertSame('', $response->getMessage());
    }
}

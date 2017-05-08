<?php

namespace Marek\OpenWeatherMap\Tests\Http\Response;

use Marek\OpenWeatherMap\Http\Response\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
    public function testResponseWithValidJson()
    {
        $data = array(
            'cod' => 404,
            'one' => 'one',
            'two' => 'two',
            'three' => 'three',
            'message' => 'my_message',
        );

        $encoded = json_encode($data);

        $response = new JsonResponse($encoded, 500);

        $this->assertEquals($data, $response->getData());
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertFalse($response->isOk());
        $this->assertTrue($response->isAuthorized());
        $this->assertEquals($data['message'], $response->getMessage());
        $this->assertEquals($encoded, (string)$response);
    }

    public function testResponseWithEmptyJsonMessageAndHttpCode()
    {
        $data = array(
            'one' => 'one',
            'two' => 'two',
            'three' => 'three',
        );
        $code = 200;

        $encoded = json_encode($data);

        $response = new JsonResponse($encoded, $code);

        $this->assertEquals($data, $response->getData());
        $this->assertEquals($code, $response->getStatusCode());
        $this->assertTrue($response->isOk());
        $this->assertTrue($response->isAuthorized());
        $this->assertEquals('', $response->getMessage());
    }

    public function testResponseWithArrayAsData()
    {
        $data = array(
            'one' => 'one',
            'two' => 'two',
            'three' => 'three',
        );
        $code = 401;

        $response = new JsonResponse($data, $code);

        $this->assertEquals($data, $response->getData());
        $this->assertEquals($code, $response->getStatusCode());
        $this->assertFalse($response->isOk());
        $this->assertFalse($response->isAuthorized());
        $this->assertEquals('', $response->getMessage());
    }

    public function testResponseWithString()
    {
        $data = '({test})';
        $code = 401;

        $response = new JsonResponse($data, $code);

        $this->assertEquals($data, (string)$response);
        $this->assertEquals($code, $response->getStatusCode());
        $this->assertFalse($response->isOk());
        $this->assertFalse($response->isAuthorized());
        $this->assertEquals('', $response->getMessage());
    }
}

<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\BoundingBox;
use PHPUnit\Framework\TestCase;

class BoundingBoxTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new BoundingBox(15.5, 20.3, 10.0, 5, 10);

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('bbox', $input->getGetParameterName());
        $this->assertEquals('15.5,20.3,10,5,10', $input->getGetParameterValue());
    }
}

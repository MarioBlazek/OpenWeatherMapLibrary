<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use PHPUnit\Framework\TestCase;

class ZipCodeTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new ZipCode(12345, 'us');

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('zip', $input->getGetParameterName());
        $this->assertEquals('12345,us', $input->getGetParameterValue());

        $input = new ZipCode(12345);

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('zip', $input->getGetParameterName());
        $this->assertEquals('12345', $input->getGetParameterValue());
    }
}

<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use PHPUnit\Framework\TestCase;

class CityNameTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new CityName('Zagreb');

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('q', $input->getGetParameterName());
        $this->assertEquals('Zagreb', $input->getGetParameterValue());
        $this->assertEquals('Zagreb', $input->getName());
        $this->assertNull($input->getCode());

        $input = new CityName('Zagreb', 'HR');

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('q', $input->getGetParameterName());
        $this->assertEquals('Zagreb,HR', $input->getGetParameterValue());
        $this->assertEquals('Zagreb', $input->getName());
        $this->assertEquals('HR', $input->getCode());
    }
}

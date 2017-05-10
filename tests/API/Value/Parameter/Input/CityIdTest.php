<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use PHPUnit\Framework\TestCase;

class CityIdTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new CityId(12);

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('id', $input->getGetParameterName());
        $this->assertEquals('12', $input->getGetParameterValue());
        $this->assertEquals(12, $input->getCityId());
    }
}

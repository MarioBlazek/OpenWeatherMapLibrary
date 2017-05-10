<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityCount;
use PHPUnit\Framework\TestCase;

class CityCountTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new CityCount(15);

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('cnt', $input->getGetParameterName());
        $this->assertEquals('15', $input->getGetParameterValue());
    }
}

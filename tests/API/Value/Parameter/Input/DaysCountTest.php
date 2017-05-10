<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount;
use PHPUnit\Framework\TestCase;

class DaysCountTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new DaysCount();

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('cnt', $input->getGetParameterName());
        $this->assertEquals('10', $input->getGetParameterValue());
        $this->assertEquals(10, $input->getCount());

        $input = new DaysCount(25);

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('cnt', $input->getGetParameterName());
        $this->assertEquals('25', $input->getGetParameterValue());
        $this->assertEquals(25, $input->getCount());
    }
}

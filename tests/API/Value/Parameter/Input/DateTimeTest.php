<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\UriParameterInterface;
use PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new DateTime();

        $this->assertInstanceOf(UriParameterInterface::class, $input);
        $this->assertEquals('datetime', $input->getUriParameterName());
        $this->assertEquals('current', $input->getUriParameterValue());
        $this->assertEquals('current', $input->getDateTime());

        $dt = new \DateTime();
        $input = new DateTime($dt);

        $this->assertInstanceOf(UriParameterInterface::class, $input);
        $this->assertEquals('datetime', $input->getUriParameterName());
        $this->assertEquals($dt->format('Y-m-d\TH:i:s\Z'), $input->getUriParameterValue());
        $this->assertEquals($dt->format('Y-m-d\TH:i:s\Z'), $input->getDateTime());
    }
}

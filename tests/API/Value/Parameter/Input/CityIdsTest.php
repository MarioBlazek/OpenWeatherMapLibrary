<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityIds;
use PHPUnit\Framework\TestCase;

class CityIdsTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $ids = array(
            new CityId(12),
            new CityId(15),
            new CityId(17),
        );

        $input = new CityIds($ids);

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('id', $input->getGetParameterName());
        $this->assertEquals('12,15,17', $input->getGetParameterValue());
    }
}

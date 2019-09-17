<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use PHPUnit\Framework\TestCase;

class CityIdTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new CityId(12);

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('id', $input->getGetParameterName());
        self::assertSame('12', $input->getGetParameterValue());
        self::assertSame(12, $input->getCityId());
    }
}

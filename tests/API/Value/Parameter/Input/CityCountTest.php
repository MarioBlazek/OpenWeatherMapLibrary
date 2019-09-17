<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityCount;
use PHPUnit\Framework\TestCase;

class CityCountTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new CityCount(15);

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('cnt', $input->getGetParameterName());
        self::assertSame('15', $input->getGetParameterValue());
    }
}

<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityName;
use PHPUnit\Framework\TestCase;

class CityNameTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new CityName('Zagreb');

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('q', $input->getGetParameterName());
        self::assertSame('Zagreb', $input->getGetParameterValue());
        self::assertSame('Zagreb', $input->getName());
        self::assertNull($input->getCode());

        $input = new CityName('Zagreb', 'HR');

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('q', $input->getGetParameterName());
        self::assertSame('Zagreb,HR', $input->getGetParameterValue());
        self::assertSame('Zagreb', $input->getName());
        self::assertSame('HR', $input->getCode());
    }
}

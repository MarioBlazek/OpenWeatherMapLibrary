<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount;
use PHPUnit\Framework\TestCase;

class DaysCountTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new DaysCount();

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('cnt', $input->getGetParameterName());
        self::assertSame('10', $input->getGetParameterValue());
        self::assertSame(10, $input->getCount());

        $input = new DaysCount(25);

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('cnt', $input->getGetParameterName());
        self::assertSame('25', $input->getGetParameterValue());
        self::assertSame(25, $input->getCount());
    }
}

<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\ZipCode;
use PHPUnit\Framework\TestCase;

class ZipCodeTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new ZipCode(12345, 'us');

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('zip', $input->getGetParameterName());
        self::assertSame('12345,us', $input->getGetParameterValue());

        $input = new ZipCode(12345);

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('zip', $input->getGetParameterName());
        self::assertSame('12345', $input->getGetParameterValue());
    }
}

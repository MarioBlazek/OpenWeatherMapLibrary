<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\UriParameterInterface;
use PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new DateTime();

        self::assertInstanceOf(UriParameterInterface::class, $input);
        self::assertSame('datetime', $input->getUriParameterName());
        self::assertSame('current', $input->getUriParameterValue());
        self::assertSame('current', $input->getDateTime());

        $dt = new \DateTimeImmutable();
        $input = new DateTime($dt);

        self::assertInstanceOf(UriParameterInterface::class, $input);
        self::assertSame('datetime', $input->getUriParameterName());
        self::assertSame($dt->format('Y-m-d\TH:i:s\Z'), $input->getUriParameterValue());
        self::assertSame($dt->format('Y-m-d\TH:i:s\Z'), $input->getDateTime());
    }
}

<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityId;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\CityIds;
use PHPUnit\Framework\TestCase;

class CityIdsTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $ids = [
            new CityId(12),
            new CityId(15),
            new CityId(17),
        ];

        $input = new CityIds($ids);

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('id', $input->getGetParameterName());
        self::assertSame('12,15,17', $input->getGetParameterValue());
    }
}

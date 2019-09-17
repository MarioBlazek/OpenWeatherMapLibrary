<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Factory;

use Marek\OpenWeatherMap\Factory\HydratorFactory;
use PHPUnit\Framework\TestCase;
use Zend\Hydrator\HydratorInterface;
use Zend\Hydrator\ObjectProperty;

class HydratorFactoryTest extends TestCase
{
    public function testItReturnsHydrator()
    {
        $factory = new HydratorFactory();

        $hydrator = $factory->create();

        self::assertInstanceOf(HydratorInterface::class, $hydrator);
        self::assertInstanceOf(ObjectProperty::class, $hydrator);
        self::assertTrue($hydrator->hasStrategy('coord'));
        self::assertTrue($hydrator->hasNamingStrategy());
    }
}

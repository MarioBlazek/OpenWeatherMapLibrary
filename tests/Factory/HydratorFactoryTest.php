<?php

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

        $this->assertInstanceOf(HydratorInterface::class, $hydrator);
        $this->assertInstanceOf(ObjectProperty::class, $hydrator);
        $this->assertTrue($hydrator->hasStrategy('coord'));
        $this->assertTrue($hydrator->hasNamingStrategy());
    }
}

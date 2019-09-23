<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Factory;

use Marek\OpenWeatherMap\Factory\SerializerFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerFactoryTest extends TestCase
{
    public function testItReturnsSerializer()
    {
        $factory = new SerializerFactory();

        $serializer = $factory->create();

        self::assertInstanceOf(SerializerInterface::class, $serializer);
    }
}

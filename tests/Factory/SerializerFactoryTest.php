<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Factory;

use Marek\OpenWeatherMap\Factory\SerializerFactory;
use Symfony\Component\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

class SerializerFactoryTest extends TestCase
{
    public function testItReturnsSerializer()
    {
        $factory = new SerializerFactory();

        $serializer = $factory->create();

        self::assertInstanceOf(SerializerInterface::class, $serializer);
    }
}

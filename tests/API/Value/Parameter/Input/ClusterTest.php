<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster;
use PHPUnit\Framework\TestCase;

class ClusterTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new Cluster();

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('cluster', $input->getGetParameterName());
        self::assertSame('yes', $input->getGetParameterValue());
        self::assertSame('yes', $input->getSelection());

        $input = new Cluster(Cluster::NO);

        self::assertInstanceOf(GetParameterInterface::class, $input);
        self::assertSame('cluster', $input->getGetParameterName());
        self::assertSame('no', $input->getGetParameterValue());
        self::assertSame('no', $input->getSelection());
    }
}

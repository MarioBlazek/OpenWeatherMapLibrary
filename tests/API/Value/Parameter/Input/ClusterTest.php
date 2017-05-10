<?php

namespace Marek\OpenWeatherMap\Tests\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Cluster;
use PHPUnit\Framework\TestCase;

class ClusterTest extends TestCase
{
    public function testItGeneratesValidParameter()
    {
        $input = new Cluster();

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('cluster', $input->getGetParameterName());
        $this->assertEquals('yes', $input->getGetParameterValue());
        $this->assertEquals('yes', $input->getSelection());

        $input = new Cluster(Cluster::NO);

        $this->assertInstanceOf(GetParameterInterface::class, $input);
        $this->assertEquals('cluster', $input->getGetParameterName());
        $this->assertEquals('no', $input->getGetParameterValue());
        $this->assertEquals('no', $input->getSelection());
    }
}

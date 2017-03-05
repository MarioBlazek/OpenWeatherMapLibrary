<?php

namespace Marek\OpenWeatherLibrary\Converter;

use Marek\OpenWeatherLibrary\Http\Response\ResponseInterface;
use Marek\OpenWeatherLibrary\Hydrator\HydratorInterface;

abstract class Converter implements ConverterInterface
{
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * Converter constructor.
     *
     * @param HydratorInterface $hydrator
     */
    public function __construct(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @inheritDoc
     */
    public function convert(ResponseInterface $response)
    {
        throw new \RuntimeException('Method not implemented.');
    }

}

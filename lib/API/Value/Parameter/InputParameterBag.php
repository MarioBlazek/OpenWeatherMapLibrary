<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter;

final class InputParameterBag
{
    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @var string
     */
    protected $url;

    /**
     * InputParameterBag constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @param ParameterInterface $parameter
     */
    public function setParameter(ParameterInterface $parameter): void
    {
        $this->parameters[] = $parameter;
    }

    /**
     * @return ParameterInterface[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}

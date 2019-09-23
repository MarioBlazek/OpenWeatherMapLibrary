<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter;

final class InputParameterBag
{
    /**
     * @var array
     */
    private $getParameters = [];

    /**
     * @var array
     */
    private $uriParameters = [];

    /**
     * @var string
     */
    private $url;

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
     * @param GetParameterInterface $parameter
     */
    public function setGetParameter(GetParameterInterface $parameter): void
    {
        $this->getParameters[] = $parameter;
    }

    public function getGetParameters(): array
    {
        return $this->getParameters;
    }

    public function setUriParameter(UriParameterInterface $parameter): void
    {
        $this->uriParameters[] = $parameter;
    }

    /**
     * @return ParameterInterface[]
     */
    public function getUriParameters(): array
    {
        return $this->uriParameters;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}

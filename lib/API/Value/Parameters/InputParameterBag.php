<?php

namespace Marek\OpenWeatherLibrary\API\Value\Parameters;

class InputParameterBag
{
    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @var string
     */
    protected $uri;

    /**
     * InputParameterBag constructor.
     *
     * @param string $uri
     */
    public function __construct($uri = '')
    {
        $this->uri = $uri;
    }

    /**
     * @param ParameterInterface $parameter
     */
    public function setParameter(ParameterInterface $parameter)
    {
        $this->parameters[] = $parameter;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }
}

<?php

namespace Marek\OpenWeatherMap\API\Value\Parameter;

class InputParameterBag
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
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @param ParameterInterface $parameter
     */
    public function setParameter(ParameterInterface $parameter)
    {
        $this->parameters[] = $parameter;
    }

    /**
     * @return ParameterInterface[]
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}

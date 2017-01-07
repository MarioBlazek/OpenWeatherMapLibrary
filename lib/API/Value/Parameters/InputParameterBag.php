<?php

namespace Marek\OpenWeatherLibrary\API\Value\Parameters;

class InputParameterBag
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var string
     */
    protected $uri;

    /**
     * InputParameterBag constructor.
     *
     * @param string $uri
     */
    public function __construct($uri)
    {
        $this->parameters = [];
        $this->uri = $uri;
    }

    /**
     * @param string $name
     * @param InputParameterInterface|string $value
     */
    public function setParameter($name, $value)
    {
        $this->parameters[$name] = (string)$value;
    }

    /**
     * @return string
     */
    public function buildQuery()
    {
        $query = http_build_query($this->parameters);

        return $this->uri . '?' . $query;
    }
}

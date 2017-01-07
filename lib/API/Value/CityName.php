<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\InputParameterInterface;

class CityName implements InputParameterInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int|null
     */
    protected $code;

    /**
     * CityName constructor.
     *
     * @param string $name
     * @param int|null $code
     */
    public function __construct($name, $code = null)
    {
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if (null === $this->code) {
            return $this->name;
        }

        return $this->name . ',' . (string)$this->code;
    }
}

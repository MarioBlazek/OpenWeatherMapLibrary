<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\GetParameterInterface;

class CityName implements GetParameterInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $code;

    /**
     * CityName constructor.
     *
     * @param string $name
     * @param string|null $code
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
     * @inheritDoc
     */
    public function getGetParameterValue()
    {
        if (null === $this->code) {
            return $this->name;
        }

        return $this->name . ',' . (string)$this->code;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterName()
    {
        return 'q';
    }
}

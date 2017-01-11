<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\InputParameterInterface;

class ZipCode implements InputParameterInterface
{
    /**
     * @var int
     */
    protected $zip;

    /**
     * @var string|null
     */
    protected $countryCode;

    /**
     * ZipCode constructor.
     *
     * @param int $zip
     * @param string|null $countryCode
     */
    public function __construct($zip, $countryCode = null)
    {
        $this->zip = $zip;
        $this->countryCode = $countryCode;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        if (null === $this->countryCode) {
            return (string)$this->zip;
        }

        return (string)$this->zip . ',' . $this->countryCode;
    }
}

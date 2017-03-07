<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\GetParameterInterface;

class ZipCode implements GetParameterInterface
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
    public function getGetParameterValue()
    {
        if (null === $this->countryCode) {
            return (string)$this->zip;
        }

        return (string)$this->zip . ',' . $this->countryCode;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterName()
    {
        return 'zip';
    }
}

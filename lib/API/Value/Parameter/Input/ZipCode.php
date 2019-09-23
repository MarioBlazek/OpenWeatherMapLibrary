<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

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
    public function __construct(int $zip, ?string $countryCode = null)
    {
        $this->zip = $zip;
        $this->countryCode = $countryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue(): string
    {
        if (null === $this->countryCode) {
            return (string) $this->zip;
        }

        return (string) $this->zip . ',' . $this->countryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName(): string
    {
        return 'zip';
    }
}

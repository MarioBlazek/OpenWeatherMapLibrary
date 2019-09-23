<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

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
    public function __construct(string $name, ?string $code = null)
    {
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue(): string
    {
        if (null === $this->code) {
            return $this->name;
        }

        return $this->name . ',' . (string) $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName(): string
    {
        return 'q';
    }
}

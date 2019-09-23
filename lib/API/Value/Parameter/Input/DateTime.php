<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use DateTimeInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\UriParameterInterface;

class DateTime implements GetParameterInterface, UriParameterInterface
{
    /**
     * @var \DateTimeInterface
     */
    protected $datetime;

    /**
     * Datetime constructor.
     *
     * @param \DateTimeInterface $datetime
     */
    public function __construct(DateTimeInterface $datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return string
     */
    public function getDateTime(): DateTimeInterface
    {
        return $this->datetime;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue(): string
    {
        return (string) $this->datetime->getTimestamp();
    }

    public function getGetParameterName(): string
    {
        throw new \RuntimeException('Not implemented.');
    }

    public function getUriParameterValue(): string
    {
        return $this->datetime->format('Y-m-d\TH:i:s\Z');
    }

    public function getUriParameterName(): string
    {
        return 'datetime';
    }
}

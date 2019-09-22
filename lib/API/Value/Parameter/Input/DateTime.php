<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

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
    public function __construct(\DateTimeInterface $datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return string
     */
    public function getDateTime()
    {
        return $this->datetime;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue()
    {
        return $this->datetime->getTimestamp();
    }

    public function getGetParameterName()
    {
        throw new \RuntimeException('Not implemented.');
    }

    public function getUriParameterValue()
    {
        return $this->datetime->format('Y-m-d\TH:i:s\Z');
    }

    public function getUriParameterName()
    {
        return 'datetime';
    }


}

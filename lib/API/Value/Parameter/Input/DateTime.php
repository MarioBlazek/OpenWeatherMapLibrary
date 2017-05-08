<?php

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\UriParameterInterface;

class DateTime implements UriParameterInterface
{
    /**
     * @var string
     */
    protected $datetime;

    /**
     * Datetime constructor.
     *
     * @param \DateTime|string $datetime
     */
    public function __construct($datetime = 'current')
    {
        if ($datetime instanceof \DateTime) {
            $this->datetime = $datetime->format('Y-m-d\TH:i:s\Z');
        } else {
            $this->datetime = $datetime;
        }
    }

    /**
     * @return string
     */
    public function getDateTime()
    {
        return $this->datetime;
    }

    /**
     * @inheritDoc
     */
    public function getUriParameterValue()
    {
        return $this->datetime;
    }

    /**
     * @inheritDoc
     */
    public function getUriParameterName()
    {
        return 'datetime';
    }
}

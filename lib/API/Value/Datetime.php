<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\UriParameterInterface;

class Datetime implements UriParameterInterface
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
            $this->datetime = $datetime->format(\DateTime::ISO8601);
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

<?php

declare(strict_types=1);

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
        if ($datetime instanceof \DateTimeImmutable) {
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
     * {@inheritdoc}
     */
    public function getUriParameterValue()
    {
        return $this->datetime;
    }

    /**
     * {@inheritdoc}
     */
    public function getUriParameterName()
    {
        return 'datetime';
    }
}

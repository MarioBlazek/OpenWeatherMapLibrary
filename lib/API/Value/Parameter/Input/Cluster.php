<?php

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

class Cluster implements GetParameterInterface
{
    const YES = 'yes';

    const NO = 'no';

    /**
     * @var string
     */
    protected $selection;

    /**
     * Cluster constructor.
     *
     * @param string $selection
     */
    public function __construct($selection = self::YES)
    {
        $this->selection = $selection;
    }

    /**
     * @return string
     */
    public function getSelection()
    {
        return $this->selection;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterValue()
    {
        return $this->selection;
    }

    /**
     * @inheritDoc
     */
    public function getGetParameterName()
    {
        return 'cluster';
    }
}

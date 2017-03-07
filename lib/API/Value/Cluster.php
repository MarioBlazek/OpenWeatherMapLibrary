<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\GetParameterInterface;

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

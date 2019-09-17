<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

class Cluster implements GetParameterInterface
{
    public const YES = 'yes';

    public const NO = 'no';

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
     * {@inheritdoc}
     */
    public function getGetParameterValue()
    {
        return $this->selection;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName()
    {
        return 'cluster';
    }
}

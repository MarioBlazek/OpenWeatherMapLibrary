<?php

namespace Marek\OpenWeatherLibrary\API\Value;

use Marek\OpenWeatherLibrary\API\Value\Parameters\InputParameterInterface;

class BoundingBox implements InputParameterInterface
{
    /**
     * @var float
     */
    protected $longitudeLeft;

    /**
     * @var float
     */
    protected $latitudeBottom;

    /**
     * @var float
     */
    protected $longitudeRight;

    /**
     * @var float
     */
    protected $latitudeTop;

    /**
     * @var int
     */
    protected $zoom;

    /**
     * BoundingBox constructor.
     *
     * @param float $longitudeLeft
     * @param float $latitudeBottom
     * @param float $longitudeRight
     * @param float $latitudeTop
     * @param int $zoom
     */
    public function __construct($longitudeLeft, $latitudeBottom, $longitudeRight, $latitudeTop, $zoom)
    {
        $this->longitudeLeft = $longitudeLeft;
        $this->latitudeBottom = $latitudeBottom;
        $this->longitudeRight = $longitudeRight;
        $this->latitudeTop = $latitudeTop;
        $this->zoom = $zoom;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return (string)$this->longitudeLeft
            . ',' . (string)$this->latitudeBottom
            . ',' . (string)$this->longitudeRight
            . ',' . (string)$this->latitudeTop
            . ',' . (string)$this->zoom;
    }
}

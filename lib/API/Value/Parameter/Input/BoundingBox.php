<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;

class BoundingBox implements GetParameterInterface
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
    public function __construct(float $longitudeLeft, float $latitudeBottom, float $longitudeRight, float $latitudeTop, int $zoom)
    {
        $this->longitudeLeft = $longitudeLeft;
        $this->latitudeBottom = $latitudeBottom;
        $this->longitudeRight = $longitudeRight;
        $this->latitudeTop = $latitudeTop;
        $this->zoom = $zoom;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterValue(): string
    {
        return (string) $this->longitudeLeft
            . ',' . (string) $this->latitudeBottom
            . ',' . (string) $this->longitudeRight
            . ',' . (string) $this->latitudeTop
            . ',' . (string) $this->zoom;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetParameterName(): string
    {
        return 'bbox';
    }
}

<?php

namespace Marek\OpenWeatherLibrary\API\Value;

class BoundingBox
{
    protected $longitudeLeft;
    protected $latitudeBottom;
    protected $longitudeRight;
    protected $latitudeTop;
    protected $zoom;

    public function __construct($longitudeLeft, $latitudeBottom, $longitudeRight, $latitudeTop, $zoom)
    {
        $this->longitudeLeft = $longitudeLeft;
        $this->latitudeBottom = $latitudeBottom;
        $this->longitudeRight = $longitudeRight;
        $this->latitudeTop = $latitudeTop;
        $this->zoom = $zoom;
    }
}

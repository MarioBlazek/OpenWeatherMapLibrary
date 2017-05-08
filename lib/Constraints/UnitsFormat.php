<?php

namespace Marek\OpenWeatherMap\Constraints;

class UnitsFormat
{
    /**
     * For temperature in Kelvin.
     */
    const STANDARD = 'standard';

    /**
     * For temperature in Celsius.
     */
    const METRIC = 'metric';

    /**
     * For temperature in Fahrenheit.
     */
    const IMPERIAL = 'imperial';
}

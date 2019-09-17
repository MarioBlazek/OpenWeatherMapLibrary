<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Constraints;

final class UnitsFormat
{
    /**
     * For temperature in Kelvin.
     */
    public const STANDARD = 'standard';

    /**
     * For temperature in Celsius.
     */
    public const METRIC = 'metric';

    /**
     * For temperature in Fahrenheit.
     */
    public const IMPERIAL = 'imperial';
}

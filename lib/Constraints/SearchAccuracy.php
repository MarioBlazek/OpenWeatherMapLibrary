<?php

namespace Marek\OpenWeatherMap\Constraints;

class SearchAccuracy
{
    /**
     * Returns exact match values.
     */
    const ACCURATE = 'accurate';

    /**
     * Returns results by searching for that substring.
     */
    const LIKE = 'like';
}

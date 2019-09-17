<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Constraints;

final class SearchAccuracy
{
    /**
     * Returns exact match values.
     */
    public const ACCURATE = 'accurate';

    /**
     * Returns results by searching for that substring.
     */
    public const LIKE = 'like';
}

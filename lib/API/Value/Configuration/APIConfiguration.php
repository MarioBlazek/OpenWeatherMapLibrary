<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Configuration;

use Marek\OpenWeatherMap\API\Constraints\Language;
use Marek\OpenWeatherMap\API\Constraints\SearchAccuracy;
use Marek\OpenWeatherMap\API\Constraints\UnitsFormat;

final class APIConfiguration
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $units;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $type;

    /**
     * APIConfiguration constructor.
     *
     * @param string $key
     * @param string $units
     * @param string $language
     * @param string $type
     */
    public function __construct(string $key, string $units = UnitsFormat::STANDARD, string $language = Language::ENGLISH, string $type = SearchAccuracy::ACCURATE)
    {
        $this->key = $key;
        $this->units = $units;
        $this->language = $language;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getUnits(): string
    {
        return $this->units;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}

<?php

namespace Marek\OpenWeatherMap\API\Value\Configuration;

use Marek\OpenWeatherMap\Constraints\SearchAccuracy;
use Marek\OpenWeatherMap\Constraints\Language;
use Marek\OpenWeatherMap\Constraints\UnitsFormat;

class APIConfiguration
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
    public function __construct($key, $units = UnitsFormat::STANDARD, $language = Language::ENGLISH, $type = SearchAccuracy::ACCURATE)
    {
        $this->key = $key;
        $this->units = $units;
        $this->language = $language;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}

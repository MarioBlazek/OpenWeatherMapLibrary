<?php

namespace Marek\OpenWeatherLibrary\Cache\Hash;

use Marek\OpenWeatherLibrary\Cache\HandlerInterface;

class KeyGenerator implements KeyGeneratorInterface
{
    /**
     * @var string
     */
    protected $prefix;

    /**
     * KeyGenerator constructor.
     *
     * @param string $prefix
     */
    function __construct($prefix = HandlerInterface::CACHE_KEY_PREFIX)
    {
        $this->prefix = $prefix;
    }

    /**
     * @inheritdoc
     */
    public function generateHashFromKey($key)
    {
        return sha1($this->prefix . '-' . $key);
    }
}

<?php

namespace Marek\OpenWeatherLibrary\Cache\Hash;

interface KeyGeneratorInterface
{
    public function generateHashFromKey($key);
}

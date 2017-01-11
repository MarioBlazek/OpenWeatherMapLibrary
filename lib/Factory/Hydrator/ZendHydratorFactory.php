<?php

namespace Marek\OpenWeatherLibrary\Factory\Hydrator;

use Zend\Hydrator\NamingStrategy\UnderscoreNamingStrategy;
use Zend\Hydrator\ObjectProperty;

class ZendHydratorFactory
{
    /**
     * @return ObjectProperty
     */
    public function createHydrator()
    {
        $hydrator = new ObjectProperty();
        $hydrator->setNamingStrategy(new UnderscoreNamingStrategy());

        return $hydrator;
    }
}

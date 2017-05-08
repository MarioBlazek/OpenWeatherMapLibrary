<?php

namespace Marek\OpenWeatherMap\Factory;

use Marek\OpenWeatherMap\Hydrator\Strategy\GeographicCoordinatesStrategy;
use Zend\Hydrator\NamingStrategy\MapNamingStrategy;
use Zend\Hydrator\ObjectProperty;

class HydratorFactory
{
    public function create()
    {
        $hydrator = new ObjectProperty();

        $mapNamingStrategy = new MapNamingStrategy([
            'Lat' => 'latitude',
            'Lon' => 'longitude',
            'lat' => 'latitude',
            'lon' => 'longitude',
            'temp_min' => 'tempMin',
            'temp_max' => 'tempMax',
            'sea_level' => 'seaLevel',
            'grnd_level' => 'groundLevel',
            'eve' => 'evening',
            'morn' => 'morning',
        ]);

        $hydrator->setNamingStrategy($mapNamingStrategy);

        $hydrator->addStrategy('coord', new GeographicCoordinatesStrategy());

        return $hydrator;
    }
}

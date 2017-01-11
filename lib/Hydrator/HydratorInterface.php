<?php

namespace Marek\OpenWeatherLibrary\Hydrator;

interface HydratorInterface
{
    /**
     * Hydrate $object with the provided $data.
     *
     * @param array $data
     * @param $object
     *
     * @return object
     */
    public function hydrate(array $data, $object);
}

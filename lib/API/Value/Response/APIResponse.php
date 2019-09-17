<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Response;

use Marek\OpenWeatherMap\API\Exception\PropertyNotFoundException;

abstract class APIResponse
{
    /**
     * Construct object optionally with a set of properties.
     *
     * @param array $properties
     */
//    public function __construct(array $properties = [])
//    {
//        foreach ($properties as $property => $value) {
//            $this->{$property} = $value;
//        }
//    }

    /**
     * Magic set function handling writes to non public properties.
     *
     *
     * @param string $property Name of the property
     * @param string $value
     *
     * @throws PropertyNotFoundException
     */
//    public function __set($property, $value)
//    {
//        if (!property_exists($this, $property)) {
//            throw new PropertyNotFoundException($property, get_class($this));
//        }
//
//        $this->{$property} = $value;
//    }

    /**
     * Magic get function handling read to non public properties.
     *
     * Returns value for all readonly (protected) properties.
     *
     *
     * @param string $property Name of the property
     *
     * @throws PropertyNotFoundException
     *
     * @return mixed
     */
//    public function __get($property)
//    {
//        if (property_exists($this, $property)) {
//            return $this->{$property};
//        }
//
//        throw new PropertyNotFoundException($property, get_class($this));
//    }
}

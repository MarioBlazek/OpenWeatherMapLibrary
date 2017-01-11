<?php

namespace Marek\OpenWeatherLibrary\Hydrator;

use Zend\Hydrator\HydratorInterface as ZendHydratorInterface;

class ObjectProperty implements HydratorInterface
{
    /**
     * @var ZendHydratorInterface
     */
    protected $internalHydrator;

    /**
     * ObjectProperty constructor.
     *
     * @param ZendHydratorInterface $hydrator
     */
    public function __construct(ZendHydratorInterface $hydrator)
    {
        $this->internalHydrator = $hydrator;
    }

    /**
     * @inheritDoc
     *
     * Hydrate an object by populating public properties
     *
     * Hydrates an object by setting public properties of the object.
     */
    public function hydrate(array $data, $object)
    {
        return $this->internalHydrator->hydrate($data, $object);
    }
}

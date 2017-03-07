<?php

namespace Marek\OpenWeatherLibrary\Hydrator;

use Marek\OpenWeatherLibrary\API\ContainerInterface;

class ObjectPropertyTreeHydrator extends BaseHydrator
{
    /**
     * @inheritdoc
     */
    public function hydrate(array $data, $object)
    {
        $classNamespace = get_class($object);

        foreach ($data as $key => $datum) {

            $key = $this->transformPropertyName($key);

            if (!is_array($datum)) {
                $object->$key = $datum;
                continue;
            }

            $className = $this->transformClassName($key, $classNamespace);

            if (!class_exists($className)) {
                $classNamespace = $classNamespace . "\\" .substr(strrchr($classNamespace, "\\"), 1);

                $classInstance = new $classNamespace;
                if ($object instanceof ContainerInterface) {
                    $object->add($classInstance);
                } else {
                    throw new \RuntimeException("Object should be instance of ContainerInterface");
                }

            } else {
                $classInstance = new $className;
                $object->$key = $classInstance;

            }

            self::hydrate($datum, $classInstance);
        }

        return $object;
    }
}

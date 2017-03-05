<?php

namespace Marek\OpenWeatherLibrary\Hydrator;

use Marek\OpenWeatherLibrary\API\ContainerInterface;

class ObjectPropertyTreeHydrator implements HydratorInterface
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
                }

                throw new \RuntimeException("Object should be instance of ContainerInterface");
            } else {
                $classInstance = new $className;
                $object->$key = $classInstance;

            }

            self::hydrate($datum, $classInstance);
        }

        return $object;
    }

    /**
     * Transforms snake case to camel case
     *
     * @param string $name
     *
     * @return string
     */
    protected function transformPropertyName($name)
    {
        return preg_replace_callback(
            '/_([a-z])/',
            function($match) {
                return strtoupper($match[1]);
            },
            $name
        );
    }

    /**
     * Transforms snake case class name to camel case
     * with fully qualified domain name
     *
     * @param string $name
     * @param string $classNamespace
     *
     * @return string
     */
    protected function transformClassName($name, $classNamespace)
    {
        $name[0] = strtoupper($name[0]);

        $name = preg_replace_callback(
            '/_([a-z])/',
            function($match) {
                return strtoupper($match[0]);
            },
            $name
        );

        return $classNamespace . '\\' . $name;
    }
}

<?php

namespace Marek\OpenWeatherLibrary\Hydrator;

class ObjectPropertyTreeHydrator implements HydratorInterface
{
    protected $path = 'Marek\\OpenWeatherLibrary\\API\\Value\\Response\\CurrentWeather\\';

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
                $object->add($classInstance);
            } else {
                $classInstance = new $className;
                $object->$key = $classInstance;

            }

            self::hydrate($datum, $classInstance);
        }
        var_dump($object);
        return $object;
    }

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

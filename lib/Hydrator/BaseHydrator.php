<?php

namespace Marek\OpenWeatherLibrary\Hydrator;

abstract class BaseHydrator implements HydratorInterface
{
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

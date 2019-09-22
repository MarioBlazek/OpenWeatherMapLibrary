<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Factory;

use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;

final class DenormalizerFactory
{
    /**
     * @return \Symfony\Component\Serializer\Serializer
     */
    public function create(): Serializer
    {
        $classMetadataFactory = new ClassMetadataFactory(
            new YamlFileLoader(__DIR__ . '/../Resources/config/definition.yaml')
        );

        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $normalizer = new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter);

        return new Serializer([new DateTimeNormalizer(), $normalizer]);
    }
}

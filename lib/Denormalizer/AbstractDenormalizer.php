<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Denormalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface as InternalDenormalizer;

abstract class AbstractDenormalizer implements DenormalizerInterface
{
    /**
     * @var \Symfony\Component\Serializer\Normalizer\DenormalizerInterface
     */
    protected $denormalizer;

    /**
     * AbstractDenormalizer constructor.
     *
     * @param \Symfony\Component\Serializer\Normalizer\DenormalizerInterface $denormalizer
     */
    public function __construct(InternalDenormalizer $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }

    /**
     * @param string $key
     * @param array $data
     * @param string $class
     *
     * @return object|null
     */
    protected function getValue(string $key, array $data, string $class): ?object
    {
        return empty($data[$key]) ? null : $this->denormalizer->denormalize($data[$key], $class);
    }

    protected function getDateTimeFromTimestamp($key, $data)
    {
        return empty($data[$key]) ? null : new \DateTimeImmutable("@{$data[$key]}");
    }

    protected function getData(string $key, array $values)
    {
        return $values[$key] === null ? null :  $values[$key];
    }
}

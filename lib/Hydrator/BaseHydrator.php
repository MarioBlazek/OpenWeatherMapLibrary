<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Hydrator;

use Zend\Hydrator\HydratorInterface as InternalHydratorInterface;

abstract class BaseHydrator
{
    /**
     * @var InternalHydratorInterface
     */
    protected $hydrator;

    public function __construct(InternalHydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @param string $key
     * @param array $data
     * @param $object
     *
     * @return object|null
     */
    protected function getValue($key, $data, $object)
    {
        return empty($data[$key]) ? null : $this->hydrator->hydrate($data[$key], $object);
    }

    /**
     * @param string $key
     * @param array $data
     *
     * @return mixed
     */
    protected function get($key, $data)
    {
        return array_key_exists($key, $data) ? $data[$key] : null;
    }

    /**
     * @param string $key
     * @param array $data
     *
     * @return \DateTime|null
     */
    protected function getDateTime($key, $data)
    {
        $date = empty($data[$key]) ?
            null :
            \DateTimeImmutable::createFromFormat('Y-m-d\TH:i:s\Z', $data[$key], new \DateTimeZone('UTC'));

        if ($date) {
            return $date;
        }

        return null;
    }

    /**
     * @param string $key
     * @param array $data
     *
     * @return \DateTime|null
     */
    protected function getDateTimeFromTimestamp($key, $data)
    {
        return empty($data[$key]) ? null : new \DateTimeImmutable("@{$data[$key]}");
    }
}

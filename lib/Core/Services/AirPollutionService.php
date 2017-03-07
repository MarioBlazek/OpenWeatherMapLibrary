<?php

namespace Marek\OpenWeatherLibrary\Core\Services;

use Marek\OpenWeatherLibrary\API\Services\AirPollution;
use Marek\OpenWeatherLibrary\API\Value\Datetime;
use Marek\OpenWeatherLibrary\API\Value\GeographicCoordinates;
use Marek\OpenWeatherLibrary\API\Value\Parameters\InputParameterBag;
use Marek\OpenWeatherLibrary\Core\BaseService;

class AirPollutionService extends BaseService implements AirPollution
{
    /**
     * @inheritdoc
     */
    public function fetchOzoneData(GeographicCoordinates $coordinates, Datetime $datetime)
    {
        $params = $this->factory
            ->buildBag('/o3/{location}/{datetime}.json');

        return $this->setParamsAndReturnResults($params, $coordinates, $datetime);
    }

    /**
     * @inheritdoc
     */
    public function fetchCarbonMonoxideData(GeographicCoordinates $coordinates, Datetime $datetime)
    {
        $params = $this->factory
            ->buildBag('/co/{location}/{datetime}.json');

        return $this->setParamsAndReturnResults($params, $coordinates, $datetime);
    }

    /**
     * @inheritDoc
     */
    public function fetchSulfurDioxideData(GeographicCoordinates $coordinates, Datetime $datetime)
    {
        $params = $this->factory
            ->buildBag('/so2/{location}/{datetime}.json');

        return $this->setParamsAndReturnResults($params, $coordinates, $datetime);
    }

    /**
     * @inheritDoc
     */
    public function fetchNitrogenDioxideData(GeographicCoordinates $coordinates, Datetime $datetime)
    {
        $params = $this->factory
            ->buildBag('/no2/{location}/{datetime}.json');

        return $this->setParamsAndReturnResults($params, $coordinates, $datetime);
    }

    protected function setParamsAndReturnResults(InputParameterBag $params, GeographicCoordinates $coordinates, Datetime $datetime)
    {
        $params->setParameter($coordinates);
        $params->setParameter($datetime);

        $url = $this->factory->build($params);

        $data = $this->get($url);

        return $this->hydrator->hydrate($data, new \Marek\OpenWeatherLibrary\API\Value\Response\AirPollution());
    }
}

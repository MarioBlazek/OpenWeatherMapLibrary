<?php

namespace Marek\OpenWeatherMap\Core\Weather;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTime;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\CarbonMonoxide;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\NitrogenDioxide;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\Ozone;
use Marek\OpenWeatherMap\API\Value\Response\AirPollution\SulfurDioxide;
use Marek\OpenWeatherMap\API\Weather\Services\AirPollutionInterface;

class AirPollution extends Base implements AirPollutionInterface
{
    /**
     * @inheritDoc
     */
    public function fetchOzoneData(GeographicCoordinates $coordinates, DateTime $datetime)
    {
        $response = $this->getResultWithParams(self::URL_OZONE, $coordinates, $datetime);

        return $this->hydrator->hydrate($response, new Ozone());
    }

    /**
     * @inheritDoc
     */
    public function fetchCarbonMonoxideData(GeographicCoordinates $coordinates, DateTime $datetime)
    {
        $response = $this->getResultWithParams(self::URL_CARBON_MONOXIDE, $coordinates, $datetime);

        return $this->hydrator->hydrate($response, new CarbonMonoxide());
    }

    /**
     * @inheritDoc
     */
    public function fetchSulfurDioxideData(GeographicCoordinates $coordinates, DateTime $datetime)
    {
        $response = $this->getResultWithParams(self::URL_SULFUR_DIOXIDE, $coordinates, $datetime);

        return $this->hydrator->hydrate($response, new SulfurDioxide());
    }

    /**
     * @inheritDoc
     */
    public function fetchNitrogenDioxideData(GeographicCoordinates $coordinates, DateTime $datetime)
    {
        $response = $this->getResultWithParams(self::URL_NITROGEN_DIOXIDE, $coordinates, $datetime);

        return $this->hydrator->hydrate($response, new NitrogenDioxide());
    }

    /**
     * @param string $url
     * @param GeographicCoordinates $coordinates
     * @param DateTime $datetime
     *
     * @return string
     */
    protected function getResultWithParams($url, GeographicCoordinates $coordinates, DateTime $datetime)
    {
        $params = $this->factory->buildBag($url);
        $params->setParameter($coordinates);
        $params->setParameter($datetime);

        return $this->getResult($this->factory->build($params));
    }
}

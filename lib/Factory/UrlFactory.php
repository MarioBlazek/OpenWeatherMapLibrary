<?php

namespace Marek\OpenWeatherLibrary\Factory;

use Marek\OpenWeatherLibrary\API\Value\Parameters\GetParameterInterface;
use Marek\OpenWeatherLibrary\API\Value\Parameters\InputParameterBag;
use Marek\OpenWeatherLibrary\API\Value\Parameters\UriParameterInterface;
use Marek\OpenWeatherLibrary\API\Value\Units;

class UrlFactory
{
    /**
     * @var string
     */
    protected $appid;

    /**
     * @var string
     */
    protected $units;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * UrlFactory constructor.
     *
     * @param string $baseUrl
     * @param string $appid
     * @param string $units
     */
    public function __construct($baseUrl, $appid, $units = Units::STANDARD)
    {
        $this->appid = $appid;
        $this->units = $units;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param InputParameterBag $bag
     *
     * @return string
     */
    public function build(InputParameterBag $bag)
    {
        $this->baseUrl = $this->baseUrl . $bag->getUri();
        $this->transformUriParameters($bag);
        $this->transformGetParameters($bag);

        return $this->baseUrl;
    }

    /**
     * @param string $uri
     *
     * @return InputParameterBag
     */
    public function buildBag($uri = '')
    {
        return new InputParameterBag($uri);
    }

    /**
     * @param InputParameterBag $bag
     */
    protected function transformUriParameters(InputParameterBag $bag)
    {
        foreach ($bag->getParameters() as $item) {
            if ($item instanceof UriParameterInterface) {
                $name = '{' . $item->getUriParameterName() . '}';
                $this->baseUrl = str_replace($name, $item->getUriParameterValue(), $this->baseUrl);
            }
        }
    }

    /**
     * @param InputParameterBag $bag
     */
    protected function transformGetParameters(InputParameterBag $bag)
    {
        $params = [];
        foreach ($bag->getParameters() as $item) {
            if ($item instanceof GetParameterInterface) {
                $params[$item->getGetParameterName()] = $item->getGetParameterValue();
            }
        }

        $params['appid'] = $this->appid;
        $params['units'] = $this->units;

        $this->baseUrl = $this->baseUrl . '?' . http_build_query($params);
    }
}


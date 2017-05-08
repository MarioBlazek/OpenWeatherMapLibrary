<?php

namespace Marek\OpenWeatherMap\Factory;

use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag;
use Marek\OpenWeatherMap\API\Value\Parameter\UriParameterInterface;
use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;

class UrlFactory
{
    /**
     * @var APIConfiguration
     */
    private $configuration;

    /**
     * UrlFactory constructor.
     *
     * @param APIConfiguration $configuration
     */
    public function __construct(APIConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @param InputParameterBag $bag
     *
     * @return string
     */
    public function build(InputParameterBag $bag)
    {
        $url = $bag->getUrl();
        $url = $this->transformUriParameters($url, $bag);
        $url = $this->transformGetParameters($url, $bag);

        return $url;
    }

    /**
     * @param string $url
     *
     * @return InputParameterBag
     */
    public function buildBag($url)
    {
        return new InputParameterBag($url);
    }

    protected function transformUriParameters($url, InputParameterBag $bag)
    {
        foreach ($bag->getParameters() as $item) {
            if ($item instanceof UriParameterInterface) {
                $name = '{' . $item->getUriParameterName() . '}';
                $url = str_replace($name, $item->getUriParameterValue(), $url);
            }
        }

        return $url;
    }

    protected function transformGetParameters($url, InputParameterBag $bag)
    {
        $params = [];
        foreach ($bag->getParameters() as $item) {
            if ($item instanceof GetParameterInterface) {
                $params[$item->getGetParameterName()] = $item->getGetParameterValue();
            }
        }

        $params['appid'] = $this->configuration->getKey();
        $params['units'] = $this->configuration->getUnits();
        $params['lang'] = $this->configuration->getLanguage();
        $params['type'] = $this->configuration->getType();

        return $url . '?' . http_build_query($params);
    }
}

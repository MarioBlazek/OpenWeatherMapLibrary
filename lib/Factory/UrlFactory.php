<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Factory;

use Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration;
use Marek\OpenWeatherMap\API\Value\Parameter\GetParameterInterface;
use Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag;
use Marek\OpenWeatherMap\API\Value\Parameter\UriParameterInterface;

final class UrlFactory
{
    /**
     * @var \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration
     */
    protected $configuration;

    /**
     * UrlFactory constructor.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Configuration\APIConfiguration $configuration
     */
    public function __construct(APIConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag $bag
     *
     * @return string
     */
    public function build(InputParameterBag $bag): string
    {
        $url = $bag->getUrl();
        $url = $this->transformUriParameters($url, $bag);


        return $this->transformGetParameters($url, $bag);
    }

    /**
     * @param string $url
     *
     * @return \Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag
     */
    public function buildBag(string $url): InputParameterBag
    {
        return new InputParameterBag($url);
    }

    /**
     * Transforms Uri paramters.
     *
     * @param string $url
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag $bag
     *
     * @return string
     */
    protected function transformUriParameters(string $url, InputParameterBag $bag): string
    {
        foreach ($bag->getUriParameters() as $item) {
            if ($item instanceof UriParameterInterface) {
                $name = '{' . $item->getUriParameterName() . '}';
                $url = str_replace($name, $item->getUriParameterValue(), $url);
            }
        }

        return $url;
    }

    /**
     * Transforms Uri GET parameters.
     *
     * @param string $url
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\InputParameterBag $bag
     *
     * @return string
     */
    protected function transformGetParameters(string $url, InputParameterBag $bag): string
    {
        $params = [];
        foreach ($bag->getGetParameters() as $item) {
            if ($item instanceof GetParameterInterface) {
                $params[$item->getGetParameterName()] = $item->getGetParameterValue();
            }
        }

        $params['appid'] = $this->configuration->getKey();
        $params['units'] = $this->configuration->getUnits();
        $params['lang'] = $this->configuration->getLanguage();
        $params['type'] = $this->configuration->getType();

        $url = $url . '?' . http_build_query($params);

        return $url;
    }
}

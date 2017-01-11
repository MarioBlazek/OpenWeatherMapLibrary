<?php

namespace Marek\OpenWeatherLibrary\Converter;

use Marek\OpenWeatherLibrary\API\Value\Response\CurrentWeather;
use Marek\OpenWeatherLibrary\Http\Response\ResponseInterface;
use Marek\OpenWeatherLibrary\Hydrator\HydratorInterface;

class CurrentWeatherConverter
{
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    public function __construct(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return CurrentWeather
     */
    public function convertByCityNameResult(ResponseInterface $response)
    {
        $data = $response->getData();

        $coord = new CurrentWeather\Coord();
        $this->hydrator->hydrate($data['coord'], $coord);

        $main = new CurrentWeather\Main();
        $this->hydrator->hydrate($data['main'], $main);

        $wind = new CurrentWeather\Wind();
        $this->hydrator->hydrate($data['wind'], $wind);

        $sys = new CurrentWeather\Sys();
        $this->hydrator->hydrate($data['sys'], $sys);

        $clouds = new CurrentWeather\Clouds();
        $this->hydrator->hydrate($data['clouds'], $clouds);

        $weathers = [];
        foreach ($data['weather'] as $item) {

            $weather = new CurrentWeather\Weather();

            $this->hydrator->hydrate($item, $weather);

            $weathers[] = $weather;

        }

        $weather = new CurrentWeather();
        $weather->id = $data['id'];
        $weather->dt = (new \DateTime())->setTimestamp($data['dt']);
        $weather->name = $data['name'];
        $weather->weather = $weathers;
        $weather->coord = $coord;
        $weather->visibility = $data['visibility'];
        $weather->main = $main;
        $weather->sys = $sys;
        $weather->wind = $wind;
        $weather->clouds = $clouds;
        $weather->rain = null;
        $weather->snow = null;

        return $weather;
    }
}

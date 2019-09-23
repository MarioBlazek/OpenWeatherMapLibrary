<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

class Period
{
    /**
     * @var \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTimeStart
     */
    private $start;

    /**
     * @var \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTimeEnd
     */
    private $end;

    /**
     * Period constructor.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTimeStart $start
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTimeEnd $end
     */
    public function __construct(DateTimeStart $start, DateTimeEnd $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTimeStart
     */
    public function getStart(): DateTimeStart
    {
        return $this->start;
    }

    /**
     * @return \Marek\OpenWeatherMap\API\Value\Parameter\Input\DateTimeEnd
     */
    public function getEnd(): DateTimeEnd
    {
        return $this->end;
    }
}

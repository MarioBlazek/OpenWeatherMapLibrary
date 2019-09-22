<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Value\Parameter\Input;

class Period
{
    /**
     * @var DateTimeStart
     */
    private $start;

    /**
     * @var DateTimeEnd
     */
    private $end;

    public function __construct(DateTimeStart $start, DateTimeEnd $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return DateTimeStart
     */
    public function getStart(): DateTimeStart
    {
        return $this->start;
    }

    /**
     * @return DateTimeEnd
     */
    public function getEnd(): DateTimeEnd
    {
        return $this->end;
    }
}

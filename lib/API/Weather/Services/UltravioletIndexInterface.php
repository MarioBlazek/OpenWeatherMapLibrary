<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\API\Weather\Services;

use Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates;
use Marek\OpenWeatherMap\API\Value\Parameter\Input\Period;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\AggregatedUltravioletIndex;
use Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex;

interface UltravioletIndexInterface
{
    /**
     * Current UV data for one location URL
     */
    public const BASE_URL = 'http://api.openweathermap.org/data/2.5/uvi';

    /**
     * Forecast UV data for one location URL
     */
    public const FORECAST_UV_URL = 'http://api.openweathermap.org/data/2.5/uvi/forecast?lat={lat}&lon={lon}&cnt={cnt}';

    /**
     * Historical UV data for one location URL
     */
    public const HISTORICAL_UV_URL = 'http://api.openweathermap.org/data/2.5/uvi/history?lat={lat}&lon={lon}&cnt={cnt}&start={start}&end={end}';

    /**
     * Fetch current Ultraviolet index for one location.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates $coordinates
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\UltravioletIndex
     */
    public function fetchCurrentUltravioletIndex(GeographicCoordinates $coordinates): UltravioletIndex;

    /**
     * Fetch forecast Ultraviolet index for one location.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates $coordinates
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount $daysCount
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\AggregatedUltravioletIndex
     */
    public function fetchForecastUltravioletIndex(GeographicCoordinates $coordinates, DaysCount $daysCount): AggregatedUltravioletIndex;

    /**
     * Fetch historical Ultraviolet index for one location.
     *
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\GeographicCoordinates $coordinates
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\Period $period
     * @param \Marek\OpenWeatherMap\API\Value\Parameter\Input\DaysCount $daysCount
     *
     * @throws \Marek\OpenWeatherMap\API\Exception\APIException
     *
     * @return \Marek\OpenWeatherMap\API\Value\Response\UltravioletIndex\AggregatedUltravioletIndex
     */
    public function fetchHistoricalUltravioletIndex(GeographicCoordinates $coordinates, Period $period, DaysCount $daysCount): AggregatedUltravioletIndex;
}

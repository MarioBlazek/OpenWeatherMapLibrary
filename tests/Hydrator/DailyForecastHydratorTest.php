<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Tests\Hydrator;

use Marek\OpenWeatherMap\API\Value\Response\DailyForecast\AggregatedDailyForecast;
use Marek\OpenWeatherMap\API\Value\Response\Weather\Weather;
use Marek\OpenWeatherMap\Hydrator\DailyForecastHydrator;
use Marek\OpenWeatherMap\Hydrator\HydratorInterface;
use PHPUnit\Framework\TestCase;

class DailyForecastHydratorTest extends TestCase
{
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $internalHydrator;

    protected function setUp()
    {
        parent::setUp();
        $this->internalHydrator = $this->getMockBuilder(\Zend\Hydrator\HydratorInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['hydrate', 'extract'])
            ->getMock();

        $this->hydrator = new DailyForecastHydrator($this->internalHydrator);
    }

    public function testHydrateWithResponseNotAggregatedDailyForecast()
    {
        $data = [];
        $response = new Weather();

        $result = $this->hydrator->hydrate($data, $response);

        self::assertSame($response, $result);
    }

    public function testHydrate()
    {
        $data = [
            'city' => [
                'id' => 524901,
                'name' => 'Moscow',
            ],
            'cod' => 200,
            'message' => 0.0295694,
            'cnt' => 14,
            'list' => [
                [
                    'dt' => 1496394000,
                    'temp' => [
                        'day' => 7.72,
                        'min' => 4.04,
                        'max' => 9.02,
                        'night' => 4.04,
                        'eve' => 7.26,
                        'morn' => 6.5,
                    ],
                    'pressure' => 994.43,
                    'humidity' => 70,
                    'speed' => 6.41,
                    'deg' => 276,
                    'clouds' => 20,
                    'rain' => 2.33,
                    'weather' => [
                        [
                            'id' => 500,
                            'main' => 'Rain',
                            'description' => 'light rain',
                            'icon' => '10d',
                        ],
                    ],
                ],
                [
                    'dt' => 1496394000,
                    'temp' => [
                        'day' => 7.72,
                        'min' => 4.04,
                        'max' => 9.02,
                        'night' => 4.04,
                        'eve' => 7.26,
                        'morn' => 6.5,
                    ],
                    'pressure' => 994.43,
                    'humidity' => 70,
                    'speed' => 6.41,
                    'deg' => 276,
                    'clouds' => 20,
                    'rain' => 2.33,
                    'weather' => [
                        [
                            'id' => 500,
                            'main' => 'Rain',
                            'description' => 'light rain',
                            'icon' => '10d',
                        ],
                    ],
                ],
            ],
        ];

        $this->internalHydrator->expects(self::exactly(5))
            ->method('hydrate');

        $response = new AggregatedDailyForecast();

        /** @var AggregatedDailyForecast $result */
        $result = $this->hydrator->hydrate($data, $response);

        self::assertSame($response, $result);
        self::assertSame($data['list'][0]['deg'], $result->list[0]->deg);
    }

    public function testHydrateWithRawData()
    {
        $data = '{"city":{"id":524901,"name":"Moscow","coord":{"lon":37.6156,"lat":55.7522},"country":"RU","population":0},"cod":"200","message":0.0295694,"cnt":14,"list":[{"dt":1496394000,"temp":{"day":7.72,"min":4.04,"max":9.02,"night":4.04,"eve":7.26,"morn":6.5},"pressure":994.43,"humidity":70,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":6.41,"deg":276,"clouds":20,"rain":2.33},{"dt":1496480400,"temp":{"day":7.63,"min":3.53,"max":10.48,"night":6.88,"eve":9.34,"morn":3.53},"pressure":999.98,"humidity":76,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":5.82,"deg":314,"clouds":44,"rain":0.46},{"dt":1496566800,"temp":{"day":12.71,"min":6.68,"max":13.19,"night":10.45,"eve":12.93,"morn":6.68},"pressure":1004.99,"humidity":65,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":5.66,"deg":266,"clouds":48,"rain":0.4},{"dt":1496653200,"temp":{"day":20.61,"min":7.54,"max":20.61,"night":7.54,"eve":16.12,"morn":15.59},"pressure":1002.58,"humidity":0,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":3.67,"deg":316,"clouds":19,"rain":0.79},{"dt":1496739600,"temp":{"day":22.46,"min":14.74,"max":22.46,"night":14.74,"eve":19.17,"morn":18.99},"pressure":1008.83,"humidity":0,"weather":[{"id":800,"main":"Clear","description":"sky is clear","icon":"01d"}],"speed":3.04,"deg":165,"clouds":0},{"dt":1496826000,"temp":{"day":23.61,"min":14.5,"max":23.61,"night":14.5,"eve":20.24,"morn":18.29},"pressure":1015.25,"humidity":0,"weather":[{"id":800,"main":"Clear","description":"sky is clear","icon":"01d"}],"speed":4.13,"deg":126,"clouds":27},{"dt":1496912400,"temp":{"day":26.86,"min":19.23,"max":26.86,"night":19.23,"eve":23.75,"morn":22.68},"pressure":1017.78,"humidity":0,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":3.18,"deg":249,"clouds":36},{"dt":1496998800,"temp":{"day":27.46,"min":13.36,"max":27.46,"night":13.36,"eve":21.18,"morn":24.46},"pressure":1014.68,"humidity":0,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":6.79,"deg":357,"clouds":14},{"dt":1497085200,"temp":{"day":24.19,"min":11.99,"max":24.19,"night":11.99,"eve":18.98,"morn":21.1},"pressure":1014.56,"humidity":0,"weather":[{"id":800,"main":"Clear","description":"sky is clear","icon":"01d"}],"speed":5.16,"deg":16,"clouds":1},{"dt":1497171600,"temp":{"day":24.04,"min":13.87,"max":24.04,"night":13.87,"eve":21.15,"morn":19.38},"pressure":1017.17,"humidity":0,"weather":[{"id":800,"main":"Clear","description":"sky is clear","icon":"01d"}],"speed":6.16,"deg":22,"clouds":0},{"dt":1497258000,"temp":{"day":28.13,"min":16.83,"max":28.13,"night":16.83,"eve":24.69,"morn":25.23},"pressure":1015.63,"humidity":0,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":5.39,"deg":359,"clouds":28,"rain":1.92},{"dt":1497344400,"temp":{"day":30.11,"min":21.77,"max":30.11,"night":21.77,"eve":26.99,"morn":26.43},"pressure":1010.34,"humidity":0,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":5.93,"deg":318,"clouds":15,"rain":0.7},{"dt":1497430800,"temp":{"day":31.16,"min":21.96,"max":31.16,"night":21.96,"eve":28.67,"morn":26.91},"pressure":1005.53,"humidity":0,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":6.85,"deg":325,"clouds":8},{"dt":1497517200,"temp":{"day":30.18,"min":22.24,"max":30.18,"night":22.24,"eve":26.89,"morn":27.43},"pressure":1001.98,"humidity":0,"weather":[{"id":500,"main":"Rain","description":"light rain","icon":"10d"}],"speed":3.09,"deg":307,"clouds":23,"rain":1.6}]}';

        $this->internalHydrator->expects(self::exactly(29))
            ->method('hydrate');

        $response = new AggregatedDailyForecast();

        /** @var AggregatedDailyForecast $result */
        $result = $this->hydrator->hydrate($data, $response);

        self::assertSame($response, $result);
        self::assertSame(276, $result->list[0]->deg);
    }
}

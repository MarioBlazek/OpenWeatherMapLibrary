<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Spec\Core;

use Marek\OpenWeatherMap\Core\WeatherServices;

describe(WeatherServices::class, function () {
    describe('->getWeatherService', function () {
        it('it is ok', function () {
            expect(1)->toBe(1);
        });
    });
});

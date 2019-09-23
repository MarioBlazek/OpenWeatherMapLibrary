<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Spec\Core;

use Marek\OpenWeatherMap\Core\WeatherServices;

describe(WeatherServices::class, static function () {
    describe('->getWeatherService', static function () {
        it('it is ok', static function () {
            expect(1)->toBe(1);
        });
    });
});

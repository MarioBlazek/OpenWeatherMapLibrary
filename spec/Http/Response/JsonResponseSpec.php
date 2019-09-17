<?php

declare(strict_types=1);

namespace Marek\OpenWeatherMap\Spec\Http\Response;

use Marek\OpenWeatherMap\Http\Response\JsonResponse;

describe(JsonResponse::class, function () {

    beforeEach(function() {
        $this->data = '{"coord":{"lon":-0.13,"lat":51.51},"weather":[{"id":300,"main":"Drizzle","description":"light intensity drizzle","icon":"09d"}],"base":"stations","main":{"temp":280.32,"pressure":1012,"humidity":81,"temp_min":279.15,"temp_max":281.15},"visibility":10000,"wind":{"speed":4.1,"deg":80},"clouds":{"all":90},"dt":1485789600,"sys":{"type":1,"id":5091,"message":0.0103,"country":"GB","sunrise":1485762037,"sunset":1485794875},"id":2643743,"name":"London","cod":200}';
        $this->decoded = json_decode($this->data, true, 512, JSON_THROW_ON_ERROR);
        $this->response = new JsonResponse($this->data , 300);
    });

    describe('->getStatusCode()', function () {
        it('expects that it will return proper http status code', function () {
            expect($this->response->getStatusCode())->toBe(200);
        });
    });

    describe('->getData()', function () {
        it('expects that', function () {
            expect($this->response->getData())->toBe($this->decoded);
        });
    });

    describe('->isOk()', function () {
        it('expects that', function () {
            expect($this->response->isOk())->toBe(true);
        });
    });

    describe('->isAuthorized()', function () {
        it('expects that', function () {
            expect($this->response->isAuthorized())->toBe(true);
        });
    });

    describe('->getMessage()', function () {
        it('expects that', function () {
            expect($this->response->getMessage())->toBe('');
        });
    });

});

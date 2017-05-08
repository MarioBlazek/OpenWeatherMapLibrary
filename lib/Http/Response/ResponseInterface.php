<?php

namespace Marek\OpenWeatherMap\Http\Response;

interface ResponseInterface
{
    /**
     * Returns HTTP status code.
     *
     * @return int
     */
    public function getStatusCode();

    /**
     * Returns data from remote service.
     *
     * @return array
     */
    public function getData();

    /**
     * Returns true is HTTP status code is 200.
     *
     * @return bool
     */
    public function isOk();

    /**
     * Returns true is HTTP status code is not 401.
     *
     * @return bool
     */
    public function isAuthorized();

    /**
     * Returns message in case of error.
     *
     * @return string
     */
    public function getMessage();
}

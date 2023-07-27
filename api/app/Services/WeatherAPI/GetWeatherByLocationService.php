<?php

namespace App\Services\WeatherAPI;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class GetWeatherByLocationService
{
    /**
     * @throws GuzzleException
     */
    public function execute(string $latitude, string $longitude): ResponseInterface
    {
        $query = [
            'lat' => $latitude,
            'lon' => $longitude,
        ];

        return (new WeatherAPIHttpClient)->getWeatherByLocation($query);
    }
}
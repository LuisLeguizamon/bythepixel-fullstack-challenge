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
            'appid' => config('weather_api.api_key'),
        ];

        return (new WeatherAPIHttpClient)->getWeatherByLocation($query);
    }
}
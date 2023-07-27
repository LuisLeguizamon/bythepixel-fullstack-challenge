<?php

namespace App\Services\WeatherAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class WeatherAPIHttpClient extends Client
{
    public function __construct()
    {
        $config['base_uri'] = config('weather_api.base_uri');

        parent::__construct($config);
    }

    /**
     * @throws GuzzleException
     */
    public function getWeatherByLocation($query = []): ResponseInterface
    {
        return $this->request('GET', '/data/2.5/weather', ['query' => $query]);
    }

}
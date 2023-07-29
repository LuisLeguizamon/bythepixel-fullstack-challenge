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
        return $this->request(
            'GET',
            '/data/2.5/weather',
            ['query' => $this->addApiKeyToQueryParam($query)]
        );
    }

    private function addApiKeyToQueryParam(array $query)
    {
        $query['appid'] = config('weather_api.api_key');

        return $query;
    }

}
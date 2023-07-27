<?php

namespace App\Http\Controllers\Api\Weather;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp;

class WeatherController extends Controller
{
    public function show(User $user)
    {
        $client = new GuzzleHttp\Client();
        $latitude = $user->latitude;
        $longitude = $user->longitude;
        $apiKey = env('OPEN_WEATHER_API_KEY');
        $baseURL = 'https://api.openweathermap.org/data/2.5';
        $url = $baseURL.'/weather?lat='.$latitude.'&lon='.$longitude.'&appid='.$apiKey;
        $res = $client->request('GET', $url);

        return response()->json([
            'user' => $user,
            'weather' => json_decode($res->getBody()->getContents())
        ]);
    }
}
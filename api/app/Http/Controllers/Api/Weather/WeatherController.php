<?php

namespace App\Http\Controllers\Api\Weather;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\WeatherAPI\GetWeatherByLocationService;

class WeatherController extends Controller
{
    public function show(User $user)
    {
        $res = (new GetWeatherByLocationService)->execute($user->latitude, $user->longitude);

        return response()->json([
            'user' => $user,
            'weather' => json_decode($res->getBody()->getContents())
        ]);
    }
}
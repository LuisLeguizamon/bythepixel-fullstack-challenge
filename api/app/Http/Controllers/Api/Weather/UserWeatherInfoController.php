<?php

namespace App\Http\Controllers\Api\Weather;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\WeatherAPI\GetWeatherByLocationService;

class UserWeatherInfoController extends Controller
{
    public function index(User $user)
    {
        $users = User::with('weatherInfo')->get();

        return response()->json([
            'users' => $users,
        ]);
    }
}
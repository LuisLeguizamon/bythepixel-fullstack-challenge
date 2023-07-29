<?php

namespace App\Http\Controllers\Api\Weather;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeatherInfo\AllUsersWeatherInfoResource;
use App\Http\Resources\WeatherInfo\UserWeatherInfoResource;
use App\Models\User;

class UserWeatherInfoController extends Controller
{
    public function index()
    {
        return AllUsersWeatherInfoResource::collection(User::with('weatherInfo')->get());
    }

    public function show(User $user)
    {
        return UserWeatherInfoResource::make($user);
    }
}

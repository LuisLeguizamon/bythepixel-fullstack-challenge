<?php

namespace App\Http\Controllers\Api\Weather;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeatherInfo\UsersWeatherInfoResource;
use App\Models\User;

class UserWeatherInfoController extends Controller
{
    public function index()
    {
        return UsersWeatherInfoResource::collection(User::with('weatherInfo')->get());
    }
}

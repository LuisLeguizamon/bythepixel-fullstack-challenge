<?php

namespace App\Http\Controllers\Api\Weather;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeatherInfo\AllUsersWeatherInfoResource;
use App\Models\User;

class UserWeatherInfoController extends Controller
{
    public function index()
    {
        return AllUsersWeatherInfoResource::collection(User::with('weatherInfo')->get());
    }
}

<?php

namespace App\Actions;

use App\Models\WeatherInfo;

class FetchWeatherInfoByUserId
{
    public function __invoke(int $userId): ?WeatherInfo
    {
        return WeatherInfo::where('user_id', $userId)->first();
    }
}
